@extends('master.master')
@section('title')
    Pertanyaan KPI
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Pertanyaan KPI</h6>
        </div>
        <div class="card-body">
            <a href="{{route('tambah-pertanyaan',$id)}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i>
                Buat Pertanyaan KPI baru</a><br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>KPI</th>
                            <th>Target</th>
                            <th>Bobot</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>KPI</th>
                            <th>Target</th>
                            <th>Bobot</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $kr)
                        <tr>
                            <td>{{$kr['kpi']}}</td>
                            <td>{{$kr['target']}}</td>
                            <td>{{$kr['bobot']}}</td>
                            <td>{{$kr['keterangan']}}</td>
                            <td>
                                <form action="{{route('delete-pertanyaan',['id' => $kr['id'], 'rid' => $id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('edit-pertanyaan',$kr['id'])}}" class="btn btn-success">Edit</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
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