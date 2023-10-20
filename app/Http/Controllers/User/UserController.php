<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\FilesTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        $data = $this->model->user()->latest()->get();
        return view('admin.user.index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function edit($id)
    {
        $data = $this->model->findOrFail($id);

        return view('admin.user.edit',['data'=>$data]);
    }
    
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        try{
            if($request->hasFile('image'))
            {
                $data['image'] = $this->saveFile($request->file('image'),config('filepath.USER_PATH'));
            }
            $data['user_type'] = 'user';
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

    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();
        $user = $this->model->findOrFail($id);

        if($request->hasFile('image'))
        {
            $data['image'] = $this->updateFile($request->file('image'),$user->image,config('filepath.USER_PATH'));
        }
        try{
            DB::beginTransaction();
            $data =  $user->update($data);
            DB::commit();
            return redirect()->route('');
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
            $this->deleteFile($data->logo,config('filePath.USER_PATH'));
        }
        $data->delete();
        return redirect()->back()->with('success','Deleted');
    }

}
