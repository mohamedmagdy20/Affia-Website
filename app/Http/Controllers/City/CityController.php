<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Imports\CityImport;
use App\Models\City;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{
    //
    protected $model;
    public function __construct(City $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data = $this->model->latest()->get();
        return view('admin.city.index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin.city.create');
    }

    public function edit($id)
    {
        $data = $this->model->findOrFail($id);

        return view('admin.city.edit',['data'=>$data]);
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        try{
            DB::beginTransaction();
            
            $data =  $this->model->create($data);
            DB::commit();
            return redirect()->back()->with('success','Added');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = $this->model->findOrFail($id);

       
        try{
            DB::beginTransaction();
            $data =  $user->update($data);
            DB::commit();
            return redirect()->route('admin.city.index')->with('success','Update');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function delete($id)
    {
        $data = $this->model->findOrFail($id);
      
        $data->delete();
        return redirect()->back()->with('success','Deleted');
    }


    public function uploadCountry(Request $request)
    {
        $request->validate(['file'=>'required|file']);
        if($request->hasFile('file'))
        {
            Excel::import(new CityImport, $request->file);
            return redirect()->back()->with('success', 'Uploaded');
        }
    }
}
