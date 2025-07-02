<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::all();
        return view('layout.table-role',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layout.form-role');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = array(
            'name_role' => 'required',
        );

        $messages = array(
            'name_role.required' => 'Nama Jabatan tidak boleh kosong',
        );

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/jabatan/tambah-jabatan')
            ->withErrors($validator);
        }

        Role::updateOrCreate([
            'name_role' => $request->name_role,
            'type' => $request->type,
        ]);

        return redirect('/jabatan/tabel-jabatan')->with('alert','Penambahan Jabatan berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Role::find($id);
        return view('layout.edit-role',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $rules = array(
            'name_role' => 'required',
        );

        $messages = array(
            'name_role.required' => 'Nama Jabatan tidak boleh kosong',
        );

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/jabatan/tambah-jabatan')
            ->withErrors($validator);
        }

        Role::updateOrCreate(
            ['id' => $id],
            [
            'name_role' => $request->name_role,
            'type' => $request->type
        ]);

        return redirect('/jabatan/tabel-jabatan')->with('alert','Pengubahan Jabatan berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Role::where('id',$id)->delete();
        return redirect('/jabatan/tabel-jabatan')->with('alert','Penghapusan Jabatan berhasil');
    }
}
