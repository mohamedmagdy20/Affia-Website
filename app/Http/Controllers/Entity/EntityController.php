<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntityController extends Controller
{
 protected $model;
 public function __construct(Entity $model)
 {
     $this->model = $model;
 }
 public function index()
 {
     $data = $this->model->latest()->get();
     return view('admin.entity.index',['data'=>$data]);
 }

 public function create()
 {
     return view('admin.entity.create');
 }

 public function edit($id)
 {
     $data = $this->model->findOrFail($id);

     return view('admin.entity.edit',['data'=>$data]);
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
         return redirect()->route('admin.entity.index')->with('success','Update');
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


 
}
