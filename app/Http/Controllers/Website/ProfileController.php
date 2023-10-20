<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Entity;
use App\Models\User;
use App\Traits\FilesTrait;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    use FilesTrait;
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $cities = City::all();
        $countries = Country::all();
        $entity = Entity::all();
        $category = Category::all();
        $data = $this->model->findOrFail(auth()->user()->id);
        // return $data;
        return view('website.dashboard.profile.index',[
            'data'=>$data,
            'city'=>$cities,
            'country'=>$countries,
            'entity'=>$entity,
            'category'=>$category
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $data = $request->validated();
        $user = $this->model->findOrFail(auth()->user()->id);
        if($request->hasFile('image'))
        {
            $data['image'] = $this->saveFile($request->file('image'),config('filepath.USER_PATH'));
        }
        $user->update($data);
        return redirect()->back()->with('success','Profile Updated');
    }
}
