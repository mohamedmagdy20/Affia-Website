<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\FilesTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    use FilesTrait;
        protected $model;
        public function __construct(Category $model)
        {
            $this->model = $model;
        }
        public function index()
        {
            $data = $this->model->latest()->get();
            return view('admin.category.index',['data'=>$data]);
        }
    
        public function create()
        {
            return view('admin.category.create');
        }
    
        public function edit($id)
        {
            $data = $this->model->findOrFail($id);
    
            return view('admin.category.edit',['data'=>$data]);
        }
        
        public function store(CategoryRequest $request)
        {
            $data = $request->validated();
            try{
                if($request->hasFile('logo'))
                {
                    $data['logo'] = $this->saveFile($request->file('logo'),config('filepath.CATEGORY_PATH'));
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
    
        public function update(CategoryRequest $request, $id)
        {
            $data = $request->validated();
            $user = $this->model->findOrFail($id);

            if($request->hasFile('logo'))
            {
                $data['logo'] = $this->updateFile($request->file('logo'),$user->logo,config('filepath.CATEGORY_PATH'));
            }
            try{
                DB::beginTransaction();
                $data =  $user->update($data);
                DB::commit();
                return redirect()->route('admin.category.index');
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
                $this->deleteFile($data->logo,config('filePath.CATEGORY_PATH'));
            }
            $data->delete();
            return redirect()->back()->with('success','Deleted');
        }
    
}
