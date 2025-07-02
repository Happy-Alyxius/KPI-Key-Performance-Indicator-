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
                <form action="{{route('update-detail-kpi',$data['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id_kpi" value="{{$data['id_kpi']}}">
                    <div class="form-group">
                        <label>Nama KPI</label>
                        <input type="text" class="form-control @error('kpi') is-invalid @enderror" name="kpi" value="{{$data['kpi']}}" required>
                        @error('kpi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Target</label>
                        <input type="number" class="form-control @error('target') is-invalid @enderror" name="target" value="{{$data['target']}}" required>
                        @error('target')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{$data['keterangan']}}" required>
                        @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Edit</button>
                    <a class="btn btn-danger" href="{{route('detail-kpi',$data['id_kpi'])}}"><i class="fa fa-ban" aria-hidden="true"></i>
                        Batal Edit</a>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection