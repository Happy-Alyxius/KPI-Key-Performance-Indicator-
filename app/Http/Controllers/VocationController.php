<?php

namespace App\Http\Controllers;

use App\Models\Vocation;
use App\Http\Requests\StoreVocationRequest;
use App\Http\Requests\UpdateVocationRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class VocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vocation::all();
        return view('layout.table-vocation',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layout/form-vocation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = array(
            'name_vocation' => 'required',
        );

        $messages = array(
            'name_role.required' => 'Nama Jabatan tidak boleh kosong',
        );

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/jurusan/tambah-jurusan')
            ->withErrors($validator);
        }

        Vocation::updateOrCreate([
            'name_vocation' => $request->name_vocation,
        ]);

        return redirect('/jurusan/tabel-jurusan')->with('alert','Penambahan Unit berhasil');
    }

    public function edit($id)
    {
        $data = Vocation::find($id);
        return view('layout/edit-vocation',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name_vocation' => 'required',
        );

        $messages = array(
            'name_role.required' => 'Nama Jabatan tidak boleh kosong',
        );

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect('/jurusan/tambah-jurusan')
            ->withErrors($validator);
        }

        Vocation::updateOrCreate(
            ['id' => $id],
            [
            'name_vocation' => $request->name_vocation,
        ]);

        return redirect('/jurusan/tabel-jurusan')->with('alert','Pengubahan Unit berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Vocation::where('id',$id)->delete();
        return redirect('/jurusan/tabel-jurusan')->with('alert','Penghapusan Jurusan berhasil');
    }
}
