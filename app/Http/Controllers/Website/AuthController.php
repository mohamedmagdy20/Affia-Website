<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Jobs\SendEmailJob;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Entity;
use App\Models\User;
use App\Traits\FilesTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    //
    use FilesTrait;
    
    public function loginView()
    {
        return view('website.login');
    }

    public function login(AuthRequest $request)
    {
        $data = $request->validated();
        if(Auth::guard('web')->attempt($data))
        {
            return redirect()->route('home')->with('success','تم تسجيل الدخول بنجاح');
        }else{
            return redirect()->back()->with('error','Invaild Email or Password');
        }
    }

    public function registerUserView()
    {
        return view('website.user-register');
    }


    public function registerProviderView()
    {
        $cities = City::all();
        $countries = Country::all();
        $entity = Entity::all();
        $category = Category::all();
        return view('website.provider-register',[
            'cities'=>$cities,
            'countries'=>$countries,
            'entity'=>$entity,
            'category'=>$category
         ]);
    }

    public function registerProvider(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|unique:users,phone',
            // 'category_id'=>'required',
            // 'entity_id'=>'required',
            // 'address'=>'required',
            // 'city_id'=>'required',
            // 'country_id'=>'required',
            'image'=>'file'
        ]);
        $data = $request->all();
        try{

        $data['slug'] = Str::slug($data['name']);
        if($request->file('image'))
        {
            $data['image'] = $this->saveFile($request->file('image'),config('filepath.USER_PATH'));
        }
        $data['user_type'] = 'provider';
        $data['otp'] = $this->generateOtp();

        $user = User::create($data);
        dispatch(new SendEmailJob($user->email , $user->otp));
        return redirect()->route('verify.view',['email'=>$user->email])->with('success','تم تسجيل سوف يصل لك كود تفعيل من خلال البريد الالكتروني');

        }catch(Exception $e)
        {
            return redirect()->back()->with('error',$e->getMessage());
        
        }

    }
    
    public function registerUser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'image'=>'file'
        ]);
        $data = $request->all();
        try{
            if($request->file('image'))
            {
                $data['image'] = $this->saveFile($request->file('image'),config('filepath.USER_PATH'));
            }
            $data['user_type'] = 'user';
            $data['otp'] = $this->generateOtp();
            $user = User::create($data);
            dispatch(new SendEmailJob($user->email , $user->otp));
            return redirect()->route('verify.view',['email'=>$user->email])->with('success','تم تسجيل سوف يصل لك كود تفعيل من خلال البريد الالكتروني');
      
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function verificationView()
    {
        return view('website.verify');
    }
    public function verification(Request $request)
    {
        $user = User::where('otp',$request->otp)->first();
        if($user)
        {
            $user->update(['is_verified',true,'otp'=>null]);
            return redirect()->route('home')->with('success','تم تفعيل الحساب');
        }else{
            return redirect()->back()->with('error','كود تفعيل خاطيء');
        }
    }

    public function resend(Request $request)
    {
        $user = User::where('email',$request->get('email'))->first();
        if($user)
        {
            dispatch(new SendEmailJob($user->email , $this->generateOtp()));
            return redirect()->back()->with('success','تم ارسال كود تفعيل الي بريدك الالكتروني');
        }else{
            return redirect()->back()->with('error','Not Found');
        }
    }


    public function logout()
    {
        auth::logout();
        return redirect()->route('home')->with('success','تم تسجيل الخروج بنجاح');
    }

    protected function generateOtp()
    {
        $randomNumber = random_int(1000, 9999); 
        return $randomNumber;
    }
}
