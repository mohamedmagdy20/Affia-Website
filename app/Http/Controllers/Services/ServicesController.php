<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;
use App\Models\User;
use App\Traits\FilesTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    //
    use FilesTrait;
    protected $model;
    public function __construct(Services $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = $this->model->latest()->get();
        return view('admin.services.index',['data'=>$data]);
    }

    public function create()
    {
        $user = User::provider()->get();
        return view('admin.services.create',['user'=>$user]);
    }

    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        $user = User::provider()->get();

        return view('admin.services.edit',['data'=>$data,'user'=>$user]);
    }
    
    public function store(ServicesRequest $request)
    {
        $data = $request->validated();
        try{
            if($request->hasFile('logo'))
            {
                $data['logo'] = $this->saveFile($request->file('logo'),config('filepath.SERVICES_PATH'));
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

    public function update(ServicesRequest $request, $id)
    {
        $data = $request->validated();
        $user = $this->model->findOrFail($id);

        if($request->hasFile('logo'))
        {
            $data['logo'] = $this->updateFile($request->file('logo'),$user->logo,config('filepath.SERVICES_PATH'));
        }
        try{
            DB::beginTransaction();
            $data =  $user->update($data);
            DB::commit();
            return redirect()->route('admin.service.index');
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
            $this->deleteFile($data->logo,config('filePath.SERVICES_PATH'));
        }
        $data->delete();
        return redirect()->back()->with('success','Deleted');
    }

}
