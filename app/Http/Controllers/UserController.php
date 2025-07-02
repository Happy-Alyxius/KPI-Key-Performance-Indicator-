<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Vocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = User::all();
        return view('layout.tables-user',['data' => $data,]);
    }

    public function add(){
        $select1 = Role::all();
        $select2 = Vocation::all();
        return view('layout.form-user',['select1'=> $select1,'select2'=> $select2]);
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'username' => 'required:users',
            'password' => 'required',
            'jabatan' => 'required',
            'unit' => 'required',
        );

        $messages = array(
            'name.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah ada',
            'password.required' => 'Password tidak boleh kosong',
        );

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/kpi/tambah-kpi')
            ->withErrors($validator);
        }

        $type = Role::find($request->jabatan);
        User::updateOrCreate([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_role' => $request->jabatan,
            'id_vocation' => $request->unit,
            'type' => $type->type,
        ]);

        return redirect('/user/tabel-user')->with('alert','Penambahan User berhasil');
    }

    public function edit($id){
        $select1 = Role::all();
        $select2 = Vocation::all();
        $data = User::find($id);
        return view('layout.edit-user',['data' => $data,'select1'=> $select1,'select2'=> $select2]);
    }

    public function update($id,Request $request)
    {
        $rules = array(
            'name' => 'required',
            'username' => 'required:users',
            'jabatan' => 'required',
            'unit' => 'required',
        );

        $messages = array(
            'name.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah ada',
        );

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/kpi/edit-kpi')
            ->withErrors($validator);
        }
        $type = Role::find($request->role_id);
        User::updateOrCreate(
            ['id' => $id],
            [
            'name' => $request->name,
            'username' => $request->username,
            'id_role' => $request->jabatan,
            'id_vocation' => $request->unit,
            'type' => $type->type,
        ]);

        return redirect('/user/tabel-user')->with('alert','Pengubahan User berhasil');
    }
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect('/user/tabel-user')->with('alert','Penghapusan User berhasil');
    }
}
