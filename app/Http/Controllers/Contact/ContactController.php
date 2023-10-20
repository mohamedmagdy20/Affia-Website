<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Traits\FilesTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    use FilesTrait;
    protected $model;
    public function __construct(Contact $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data = $this->model->first();
        return view('admin.contact.index',['data'=>$data]);
    }

 
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = $this->model->findOrFail($id);

        if($request->hasFile('logo'))
        {
            $data['logo'] = $this->updateFile($request->file('logo'),$user->logo,config('filepath.SETTING_PATH'));
        }
        try{
            DB::beginTransaction();
            $data =  $user->update($data);
            DB::commit();
            return redirect()->route('admin.contact.index')->with('success','Updated');
        }catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

  
}
