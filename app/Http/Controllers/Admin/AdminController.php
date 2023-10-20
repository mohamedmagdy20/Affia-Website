<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //    //
    protected $model;
    public function __construct(Admin $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data = $this->model->latest()->get();
        return view('admin.admin.index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function edit($id)
    {
        $data = $this->model->findOrFail($id);

        return view('admin.admin.edit',['data'=>$data]);
    }
    
    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        try{
            DB::beginTransaction();
            $user =  $this->model->create($data);
            DB::commit();
            return redirect()->back()->with('success','Added');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function update(AdminRequest $request, $id)
    {
        $data = $request->validated();
        $user = $this->model->findOrFail($id);

        try{
            DB::beginTransaction();
            $user =  $user->update($data);
            DB::commit();
            return redirect()->route('admin.users.index');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
        return redirect()->back()->with('success','Deleted');
    }

}
