@extends('master.master')
@section('title')
    Tambah Pertanyaan
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penambahan Data Pertanyaan KPI</h6>
            </div>
            <div class="card-body">
                <form action="{{route('simpan-pertanyaan')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $id }}" name='id'>
                    <div class="form-group">
                        <label>Ketentuan KPI</label>
                        <input type="text" class="form-control @error('kpi') is-invalid @enderror" name="kpi" required>
                        @error('kpi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Target</label>
                        <input type="number" class="form-control @error('target') is-invalid @enderror" name="target" required>
                        @error('target')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Bobot</label>
                        <input type="number" class="form-control @error('bobot') is-invalid @enderror" name="bobot" required>
                        @error('bobot')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                        @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
                    <a class="btn btn-danger" href="{{route('tabel-kpi')}}"><i class="fa fa-ban" aria-hidden="true"></i>
                        Batal Tambah</a>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection