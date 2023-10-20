<?php

namespace App\Http\Controllers;

use App\Jobs\ResetPasswordJob;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    //
    public function forgetPasswordView()
    {
        return view('website.forget-password');
    }

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);
        DB::table('password_reset_tokens')->where('email',$request->email)->delete();
        // if($is_Exist)
        // {
        //     $is_Exist->delete();
        // }
        
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);
          dispatch(new ResetPasswordJob($token , $request->email));
        
        return redirect()->back()->with('success', 'تم ارسال رابط تغير كلمة المرور');
    }

    public function ResetPasswordView($token) { 
        return view('website.reset-password', ['token' => $token]);
    }

    public function changePassword(Request $request,$token)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $data = DB::table('password_reset_tokens')->where('token',$token)->first();
        if($data)
        {
            $user = User::where('email',$data->email)->first();
            $user->update(['password'=>Hash::make($request->password)]);
            $data->delete();
            return redirect()->route('website.login')->with('success','تم تغير كلمة المرور بنجاح');
        }else{
            return redirect()->back()->with('error','Error Accure');
        }
    }
}
