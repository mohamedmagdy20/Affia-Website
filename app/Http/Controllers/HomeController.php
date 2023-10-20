<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Services;
use App\Models\User;
use App\Models\About;
use App\Models\Contact;
use App\Models\Header;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $city = City::all();
        $headers = Header::all();
        $country = Country::all();
        $latestServices = User::where('user_type','provider')->where('category_id','!=',null)->where('entity_id','!=',null)->latest()->take(6)->get();
        $services = User::where('user_type','provider')->where('category_id','!=',null)->where('entity_id','!=',null)->take(9)->get();
        $category = Category::all();
        return view('website.index',[
            'city'=>$city,
            'country'=>$country,
            'services'=>$services,
            'category'=>$category,
            'latestServices'=>$latestServices,
            'headers'=>$headers
        ]);
    }

    public function show($slug)
    {
        $data = User::where('slug',$slug)->with('services')->first();
        // return $data;
        return view('website.provider',['data'=>$data]);
    }

    public function providers(Request $request)
    {
        $data = User::query()->where('user_type','provider');
        $city = City::all();
        $country = Country::all();
        $category = Category::all();
        if(isset($request->name)){
            $data->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if(isset($request->city))
        {
            $data->where('city_id',$request->city);
        }
        if(isset($request->country))
        {
            $data->where('country_id',$request->country);
        }

        if(isset($request->category))
        {
            $data->where('category_id',$request->category);
        }
        $all =  $data->paginate(9);
        return view('website.providers',[
            'data'=>$all,
            'city'=>$city,
            'country'=>$country,
            'category'=>$category,]);
    }

    public function about(){
        $data = About::first();
        return view('website.about',['data'=>$data]);
    }

    public function contact()
    {
        $data = Contact::first();
        return view('website.contact',['data'=>$data]);
    }
    public function dashboard()
    {
        return view('website.dashboard.index');
    }
}
