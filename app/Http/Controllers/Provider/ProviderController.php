<?php

namespace App\Http\Controllers\Provider;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Imports\ProviderImport;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Entity;
use App\Models\User;
use App\Traits\FilesTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ProviderController extends Controller
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
        $data = $this->model->provider()->latest()->get();
        return view('admin.provider.index',['data'=>$data]);
    }

    public function create()
    {
        $category = Category::all();
        $city =City::all();
        $country =Country::all();
        $entity = Entity::all();
        return view('admin.provider.create',[
            'category'=>$category,
            'city'=>$city,
            'country'=>$country,
            'entity'=>$entity
        ]);
    }

    public function edit($id)
    {
        $category = Category::all();
        $city =City::all();
        $country =Country::all();
        $entity = Entity::all();
      
        $data = $this->model->findOrFail($id);
        return view('admin.provider.edit',['data'=>$data,
        'category'=>$category,
        'city'=>$city,
        'country'=>$country,
        'entity'=>$entity
    ]);
    }
    
    public function store(ProviderRequest $request)
    {
        $data = $request->validated();
        try{
            if($request->hasFile('image'))
            {
                $data['image'] = $this->saveFile($request->file('image'),config('filepath.USER_PATH'));
            }
            DB::beginTransaction();
            $data['user_type'] = 'provider';
            $data['slug'] = Str::slug($data['name']);

            $data =  $this->model->create($data);
            DB::commit();
            return redirect()->back()->with('success','Added');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function update(ProviderRequest $request, $id)
    {
        $data = $request->validated();
        $user = $this->model->findOrFail($id);

        if($request->hasFile('image'))
        {
            $data['image'] = $this->updateFile($request->file('image'),$user->logo,config('filepath.USER_PATH'));
        }
        try{
            DB::beginTransaction();
            $data =  $user->update($data);
            DB::commit();
            return redirect()->route('admin.provider.index')->with('success','Updated');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function delete($id)
    {
        $data = $this->model->findOrFail($id);
        if($data->logo != null)
        {
            $this->deleteFile($data->logo,config('filepath.USER_PATH'));
        }
        $data->delete();
        return redirect()->back()->with('success','Deleted');
    }


    public function uploadProvider(Request $request)
    {
        $request->validate(['file'=>'required|file']);
        if($request->hasFile('file'))
        {
            Excel::import(new ProviderImport, $request->file);
            return redirect()->back()->with('success', 'Uploaded');
        }
    }
}
