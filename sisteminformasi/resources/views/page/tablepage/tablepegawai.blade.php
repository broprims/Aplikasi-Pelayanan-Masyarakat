@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Table Pegawai</h1>
        </div>

        <style>
            .font-table{
                font-size: 11.5px;
            }

            .font-label{
                font-size: 12px;
                font-weight: 600;
            }
        </style>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Penduduk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nik->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pegawai->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-check fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Content Row -->


        <!-- Begin Page Content -->
        <div class="">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                
                <div class="card-body">
                    <div class="justify-content-between d-flex">
                        <div class="d-flex mb-2">
                            <a href="{{ route('tablemasyarakat') }}" class="mr-2 btn btn-primary" style="font-size: 12px;">Table Masyarakat</a>
                            <a href="{{ route('tablepegawai') }}" class="mr-2 btn btn-success" style="font-size: 12px;">Table Pegawai</a>
                            <a href="{{ route('tableadmin') }}" class="btn btn-warning" style="font-size: 12px;">Table Admin</a>
                        </div>

                        <div>
                            <a type="button" data-toggle="modal" data-target="#tambahpegawai" class="btn btn-secondary" style="font-size: 12px;">Tambah Pegawai <i class="fas fa-user-plus"></i></a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="tambahpegawai" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Pegawai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                </div>
                                <form action="/tablepegawai/store" method="POST">
                                    @csrf
                                    <div class="modal-body"> 
                                        <div class="mb-1 col-md-6 d-none">
                                            <input type="number" name="no" class="form-control" value="{{$nobaru}}">
                                        </div>

                                        <div class="mb-1 col-md-6 d-none">
                                            <input type="text" name="id_register" id="id_register" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="NIK" class="col-form-label font-label">NIK:</label>
                                            <input type="text" class="form-control" id="nik" name="nik" required>
                                        <!-- <select name="nik" id="nik" class="form-control" required>
                                            <option selected disabled  value=" "></option>
                                            @foreach ($nik as $item)
                                            <option value="{{ $item->nik }}" class="dropdown-item">{{$item->nik}}</option>
                                            @endforeach
                                            </select> -->
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="nama" class="col-form-label font-label">Nama:</label>
                                                <input type="text" class="form-control" id="username" name="nama" readonly required>
                                                <!-- <select name="nama" id="qontol" class="form-control" readonly>
                                                <option selected disabled  value=" ">tod</option>
                                                </select> -->
                                            </div>
    
                                            <div class="mb-3 col-md-6">
                                                <label for="kode_user" class="col-form-label font-label">Kode User:</label>
                                                <input type="hidden" class="form-control" id="kode_user" name="kode_user" value="P{{$kode_user}}">
                                                <input type="text" class="form-control" id="kode_user" name="kode_user" value="P{{$kode_user}}" disabled>
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="nama" class="col-form-label font-label">Username:</label>
                                                <input type="text" class="form-control" id="nama" name="username">
                                                <input type="hidden" class="form-control" id="role" name="role" value="pegawai">
                                            </div>
    
                                            <div class="mb-3 col-md-6">
                                                <label for="password" class="col-form-label font-label">Password:</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>

                                            <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>" id="">
                                            <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d'); ?>" id="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        <!-- Modal -->

                    </div> 

                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Users</strong> {{ session()->get('success') }}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    @endif 
                    
                    @if(session()->get('error'))
                    <div class="alert alert-block" data-dismiss="alert" data-aos="fade-up" data-aos-duration="1000" style="background: rgba(3, 121, 3, 0.582);">
                        <button type="button" class="close" data-dismiss="alert" style="margin-top: -3px;"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <strong>Users</strong> {{ session()->get('error') }}.
                    </div>
                    @endif


                    <form action="{{ url("/tablepegawai/search") }}" method="get" class="mt-4">

                        @csrf
                        <div class="row mt-2 mb-2">
                            <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input name="kode_user" value="{{Request::get('kode_user')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Kode User">
                                    </div>
                            </div>

                            <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="nama" value="{{Request::get('nama')}}"class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nama">
                                    </div>
                            </div>

                            <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="username" value="{{Request::get('username')}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Username">
                                    </div>
                            </div>

                            <div class="col-md-2">
                                <div class="input-group input-group-sm">
                                    <input type="date" name="created_at" value="{{Request::get('created_at')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                            </div>

                            <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input type="date" name="updated_at" value="{{Request::get('updated_at')}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-white btn-outline-success" style="font-size: 12px;" type="submit">
                                    Search <i class="fa fa-search"></i>
                                </button>
                            </div>

                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr class="font-table">
                                <th>NO</th>
                                <th>Kode User</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th class="text-right">Ditambahkan</th>
                                <th>Terakhir di Ubah</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($pegawai as $data)
                            @if($data->role =="pegawai")
                            <tr class="font-table">
                                <tr class="font-table">
                                    <td>{{ $no++ }}</</td>
                                    <td>{{ $data->kode_user }}</td>
                                    <td style="width: 300px;">{{ $data->nama }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td class="text-right">{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                    <td>{{ date('d M, Y', strtotime($data->updated_at)) }}</td>
                                    <td class="text-right">
                                        <div class="table-data-feature">
                                            <a class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer;" type="button" data-toggle="modal" data-target="#editpegawai{{ $data->id }}">
                                                <i class="fas fa-pen text-center ml-1 mr-1"></i>
                                            </a>

                                            <a class="item bg-danger p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer;" type="button" data-toggle="modal" data-target="#deleted{{$data->id}}">
                                                <i class="fas fa-trash text-center ml-1 mr-1"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tr>

                            <!-- Edit Admin -->
                            <div class="modal fade" id="editpegawai{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Pegawai</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/tablemasyarakat/update/{{$data->kode_user}}" method="POST">
                                    @csrf
                                    <div class="modal-body">                             
                                        <div class="mb-1">
                                            <label for="NIK" class="col-form-label font-label">NIK:</label> 
                                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $data->nik }}" readonly>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label for="nama" class="col-form-label font-label">Nama:</label>
                                                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label for="kode_user" class="col-form-label font-label">Kode User:</label>
                                                <input type="text" class="form-control" id="kode_user" name="kode_user" value="{{ $data->kode_user }}" disabled>
                                                <input type="hidden" class="form-control" id="kode_user" name="kode_user" value="{{ $data->kode_user }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label for="nama" class="col-form-label font-label">Username:</label>
                                                <input type="text" class="form-control" id="nama" name="username" value="{{ $data->username }}">
                                                <input type="hidden" class="form-control" id="role" name="role" value="{{$data->role}}">
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label for="password" class="col-form-label font-label">Password:</label>
                                                <div class="d-flex">
                                                    <a href="" class="btn btn-warning col-4 pt-2" style="font-size: 13px; font-weight: 600;" type="button" data-toggle="modal" data-target="#password{{$data->id}}" data-dismiss="modal">Ubah Password</a>
                                                </div>
                                                <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d'); ?>" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <!-- end Edit pegawai -->

                            <!-- hapus users -->
                            <div class="modal fade" id="deleted{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title text-capitalize" id="staticBackdropLabel">Deleted {{$data->role}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/tablepegawai/destroy2/{{$data->kode_user}}" method="POST">
                                    @csrf            
                                    <div class="container mt-3 mb-3">
                                        <span class="text-capitalize" style="font-size: 20px;">Apakah anda yakin ingin menghapus {{ $data->username }}??</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Deleted</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <!-- end hapus users -->

                            <div class="modal fade" id="password{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title text-capitalize" id="staticBackdropLabel">Ubah Password {{$data->role}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/tableuser/updatepassword/{{$data->kode_user}}" method="POST">
                                    @csrf            
                                    <div class="container">
                                        <div class="row">
                                            <div class="mb-4 col-md-12">
                                                <label for="password" class="col-form-label font-label">Password Baru:</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-toggle="modal" data-target="#editusers{{$data->id}}" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <!-- end Password users -->

                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>

@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>




    <script type="text/javascript">

        // USER
        $(document).ready(function() {
            $('#nik').keyup( function() {
                var nIk = $(this).val();
                if(nIk) {
                    $.ajax({
                        url: '/getUser/'+nIk,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data)
                        {
                            if(data){
                                $('#username').empty();
                                // $('#qontol').append('<option hidden>Choose User</option>');
                                $.each(data, function(key, users){
                                    $('#username').val(users.nama);
                                });
                            }else{
                                $('#username').empty();
                            }
                        }
                    });
                }else{
                    $('#username').empty();
                }

                if(nIk) {
                $.ajax({
                    url: '/getUser/'+nIk,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data)
                    {
                        if(data){
                            $('#id_register').empty();
                            // $('#qontol').append('<option hidden>Choose User</option>');
                            $.each(data, function(key, users){
                                $('#id_register').val(users.id_register);
                            });
                        }else{
                            $('#id_register').empty();
                        }
                    }
                });
                }else{
                    $('#id_register').empty();
                }

                if(nIk) {
                    $.ajax({
                        url: '/getUser/'+nIk,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data)
                        {
                            if(data){
                                $('#code').empty();
                                // $('#qontol').append('<option hidden>Choose User</option>');
                                $.each(data, function(key, users){
                                    $('#code').val(users.id_register );
                                });
                            }else{
                                $('#code').empty();
                            }
                        }
                    });
                }else{
                    $('#code').empty();
                }code
            });
        });

    </script>

@endsection
