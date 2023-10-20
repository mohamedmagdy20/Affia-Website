<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;
use App\Traits\FilesTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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
        $data = $this->model->latest()->where('user_id',auth()->user()->id)->get();
        return view('website.dashboard.services.index',['data'=>$data]);
    }

    public function create()
    {
        return view('website.dashboard.services.create');
    }

    public function edit($id)
    {
        $data = $this->model->findOrFail($id);

        return view('website.dashboard.services.edit',['data'=>$data]);
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
            return redirect()->route('dashboard')->with('success','Updated');
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
