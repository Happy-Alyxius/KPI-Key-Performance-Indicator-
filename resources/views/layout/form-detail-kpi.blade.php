@extends('master.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Penambahan Data KPI</h6>
            </div>
            <div class="card-body">
                <form action="{{route('masuk-detail-kpi',$id)}}" method="post">
                    @csrf
                    <input type="hidden" name="id_kpi" value="{{$id}}">
                    <div class="form-group">
                        <label>Nama KPI</label>
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
                    <input type="hidden" name="kpi-id" value="{{$id}}">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" required>
                        @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button>
                    <a class="btn btn-danger" href="{{route('detail-kpi',$id)}}"><i class="fa fa-ban" aria-hidden="true"></i>
                        Batal Tambah</a>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection