@extends('master.master')
@section('title')
    Dashboard
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Penambahan Data User</h6>
        </div>
        <div class="card-body">
            <form action="{{route('masuk-user')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" required>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control">
                        @foreach ($select1 as $s1)
                        <option value="{{$s1['id']}}">{{$s1['name_role']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Unit</label>
                    <select name="unit" id="unit" class="form-control">
                        @foreach ($select2 as $s2)
                        <option value="{{$s2['id']}}">{{$s2['name_vocation']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
                <a class="btn btn-danger" href="{{route('tabel-user')}}"><i class="fa fa-ban" aria-hidden="true"></i>
                    Batal Tambah</a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection