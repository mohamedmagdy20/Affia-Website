<?php

namespace App\Http\Controllers\Header;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Traits\FilesTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
       use FilesTrait;
       protected $model;
       public function __construct(Header $model)
       {
           $this->model = $model;
       }
       public function index()
       {
           $data = $this->model->latest()->get();
           return view('admin.header.index',['data'=>$data]);
       }
   
       public function create()
       {
           return view('admin.header.create');
       }
   
       public function edit($id)
       {
           $data = $this->model->findOrFail($id);
   
           return view('admin.header.edit',['data'=>$data]);
       }
       
       public function store(Request $request)
       {
           $data = $request->all();
           try{
               if($request->hasFile('logo'))
               {
                   $data['logo'] = $this->saveFile($request->file('logo'),config('filepath.HEADER_PATH'));
               }
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

           if($request->hasFile('logo'))
           {
               $data['logo'] = $this->updateFile($request->file('logo'),$user->logo,config('filepath.HEADER_PATH'));
           }
           try{
               DB::beginTransaction();
               $data =  $user->update($data);
               DB::commit();
               return redirect()->route('admin.header.index')->with('success','Updated');
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
               $this->deleteFile($data->logo,config('filePath.HEADER_PATH'));
           }
           $data->delete();
           return redirect()->back()->with('success','Deleted');
       }

}
