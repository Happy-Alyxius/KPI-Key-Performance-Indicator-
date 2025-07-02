@extends('master.master')
@section('title')
    User
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
            <h6 class="m-0 font-weight-bold text-primary">Table User</h6>
        </div>
        <div class="card-body">
            <a href="{{route('tambah-user')}}" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i>
                Buat User Baru</a><br><br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Unit</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{$d['name']}}</td>
                            <td>{{$d['username']}}</td>
                            <td>@if ($d->type == "kepegawaian")
                            <span class="badge badge-success"> Admin </span>
                            @endif
                            @if ($d->type == "tendik")
                            <span class="badge badge-primary"> Pegawai </span>
                            @endif
                            @if ($d->type == "mahasiswa")
                            <span class="badge badge-primary"> Mahasiswa </span>
                            @endif
                            @if ($d->type == "rektor")
                            <span class="badge badge-warning"> Rektor </span>
                            @endif
                            @if ($d->type == "kaprodi")
                            <span class="badge badge-warning"> Kaprodi </span>
                            @endif
                            </td>
                            <td>{{$d->vocation['name_vocation']}}</td>
                            <td>
                            <form action="{{route('delete-user',$d['id'])}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{route('edit-user',$d->id)}}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus user ini?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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