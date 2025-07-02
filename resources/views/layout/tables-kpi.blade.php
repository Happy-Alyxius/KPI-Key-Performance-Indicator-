@extends('master.master')
@section('title')
    KPI
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data KPI</h6>
        </div>
        <div class="card-body">
            <a href="{{route('tambah-kpi')}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i>
                Buat KPI Baru</a><br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Unit</th>
                            <th>Detail KPI</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Unit</th>
                            <th>Detail KPI</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $kp)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$kp['name']}}</td>
                            <td>{{$kp->role['name_role']}}</td>
                            <td>{{$kp->vocation['name_vocation']}}</td>
                            <td><a href="{{route('tabel-pertanyaan',$kp['id'])}}" class="btn btn-primary"><i class="fa fa-folder" aria-hidden="true"></i>
                                Detail KPI</a></td>
                            <td>
                                <form action="{{route('delete-kpi',$kp['id'])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('edit-kpi',$kp['id'])}}" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus produk ini?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
@section('script')
 <!-- Page level plugins -->
 <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

 <!-- Page level custom scripts -->
 <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endsection