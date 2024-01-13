@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Kependudukan</h1>
            <form action="{{ url("/printsearchmys") }}" method="get">
                @csrf
                <input type="hidden" name="id_register" value="{{Request::get('id_register')}}">
                <input type="hidden" name="nama"value="{{Request::get('nama')}}">
                <input type="hidden" name="nik" value="{{Request::get('nik')}}">
                <input type="hidden" name="banjar" value="{{Request::get('banjar')}}">
                <input type="hidden" name="created_at" value="{{Request::get('created_at')}}">
                <input type="hidden" name="updated_at" value="{{Request::get('updated-at')}}">
                <div class="col-md-12">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit" target="blank">
                        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                    </button>
                </div>
            </form>
{{--            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
{{--                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
        </div>

        <style>
            .font-table{
                font-size: 10px;
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
                                    Jumlah Penduduk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $penduduk->count() }}</div>
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
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Penduduk Asli</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $asli->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-2x text-gray-300"></i>
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
                                    Penduduk Pendatang</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendatang->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-male fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Jumlah Keluarga</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendatang->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-home fa-2x text-gray-300" aria-hidden="true"></i>
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
                            <br>
                        </div>

                        <div>
                            <a type="button" data-toggle="modal" data-target="#tambahmasyarakat" class="btn btn-secondary" style="font-size: 12px;">Tambah Masyarakat <i class="fas fa-user-plus"></i></a>
                        </div>

                        <!--Start Modal Tambah-->
                        <div class="modal fade" id="tambahmasyarakat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Masyarakat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                </div>
                                <form action="/datapenduduk/store" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-1 d-none">
                                        <input type="number" class="form-control" name="no" value="{{$nobaru}}">
                                    </div>

                                    <div class="mb-1 d-none">
                                        <label for="id" class="col-form-label font-label">id_register:</label>
                                        <input type="text" class="form-control" id="id" name="id_register" value="{{$id_register}}">
                                    </div>

                                    <div class="mb-1">
                                        <label for="NIK" class="col-form-label font-label">NIK:</label>
                                        <input type="number" class="form-control" id="NIK" name="nik">
                                    </div>

                                    <div class="mb-1">
                                        <label for="no_kk" class="col-form-label font-label">No KK:</label>
                                        <input type="number" class="form-control" id="no_kk" name="no_kk">
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label for="nama" class="col-form-label font-label">Nama:</label>
                                            <input type="text" class="form-control" id="nama" name="nama">
                                        </div>

                                        <div class="mb-1 col-md-3">
                                            <label for="tempat_lahir" class="col-form-label font-label">Tempat Lahir:</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat lahir">
                                        </div>

                                        <div class="mb-1 col-md-3">
                                            <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-md-3">
                                            <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                            <select name="gender" class="form-control" id="">
                                                <option value=" ">--Pilih Jenis Kelamin--</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="mb-1 col-md-3">
                                            <label for="status_pernikahan" class="col-form-label font-label">Status Pernikahan:</label>
                                            <select name="status_pernikahan" class="form-control" id="">
                                                <option value=" ">--Pilih Status Pernikahan--</option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Sudah Menikah">Sudah Menikah</option>
                                            </select>
                                        </div>

                                        <div class="mb-1 col-md-3">
                                            <label for="agama" class="col-form-label font-label">Agama:</label>
                                            <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                                        </div>

                                        <div class="mb-1 col-md-3">
                                            <label for="pekerjaan" class="col-form-label font-label">Pekerjaan:</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                                        </div>

                                        <div class="mb-1 col-md-3 d-none">
                                            <label for="desa" class="col-form-label font-label">Desa:</label>
                                            <input type="hidden" class="form-control" id="desa" name="desa" value="Pengeragoan">
                                            <input type="text" class="form-control" id="desa" name="desa" value="Pengeragoan" disabled>
                                        </div>

                                        <div class="mb-1 col-md-3 d-none">
                                            <label for="kec" class="col-form-label font-label">Kecamatan:</label>
                                            <input type="hidden" class="form-control" id="kec" name="kec" value="Pekutatan">
                                            <input type="text" class="form-control" id="kec" name="kec" value="Pekutatan" disabled>
                                        </div>

                                        <div class="mb-1 col-md-3 d-none">
                                            <label for="kab" class="col-form-label font-label">Kabupaten:</label>
                                            <input type="hidden" class="form-control" id="kab" name="kab" value="Jembarana">
                                            <input type="text" class="form-control" id="kab" name="kab" value="Jembarana" disabled>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-md-3 d-none">
                                            <label for="provinsi" class="col-form-label font-label">Provinsi:</label>
                                            <input type="hidden" class="form-control" id="provinsi" name="provinsi" value="Bali">
                                            <input type="text" class="form-control" id="provinsi" name="provinsi" value="Bali" disabled>
                                        </div>

                                        <div class="mb-1 col-md-3 d-none">
                                            <label for="negara" class="col-form-label font-label">Kewarganegaraan:</label>
                                            <input type="hidden" class="form-control" id="negara" name="negara" value="Indonesia">
                                            <input type="text" class="form-control" id="negara" name="negara" value="Indonesia" disabled>
                                        </div>

                                        <div class="mb-1 col-md-3">
                                            <label for="banjar" class="col-form-label font-label">Banjar:</label>
                                            <select name="banjar" id="banjar" class="form-control" required>
                                                <option value=" " selected disabled>--pilih banjar--</option>
                                                @foreach($banjar as $item)
                                                    <option value="{{ $item->nama_banjar }}">{{ $item->nama_banjar }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-1 col-md-3">
                                            <label for="banjar" class="col-form-label font-label">Jenis Penduduk:</label>
                                            <select name="masyarakat" id="banjar" class="form-control" required>
                                                <option value=" " selected disabled>--pilih penduduk--</option>
                                                <option value="pendatang">Pendatang</option>
                                                <option value="asli">Penduduk Asli</option>
                                            </select>
                                        </div>

                                        <div class="mb-1 col-md-6">
                                            <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat">
                                        </div>

                                        <input type="hidden" name="value" value="1" id="">
                                        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>" id="">
                                        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d'); ?>" id="">
                                        <input type="hidden" name="tahun" value="<?php echo date('Y'); ?>" id="">
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <label for="pendidikan" class="col-form-label font-label">Pendidikan Terakhir:</label>
                                            <select name="pendidikan" class="form-control" id="">
                                                <option value=" ">--Pilih Pendidikan Terakhir--</option>
                                                <option value="SD">Sekolah Dasar</option>
                                                <option value="SMP">Sekolah Menengah Pertama</option>
                                                <option value="SMA">Sekolah Menengah Keatas</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <label for="provinsi" class="col-form-label font-label">Keterangan:</label>
                                            <textarea class="form-control" placeholder="Keterangan lainnya" name="keterangan"></textarea>
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
                        <!--End Modal Tambah-->


                    </div>

                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data Penduduk</strong> {{ session()->get('success') }}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>

                    {{-- <div class="alert alert-block" data-dismiss="alert" data-aos="fade-up" data-aos-duration="1000" style="background: rgba(3, 121, 3, 0.582);">
                        <button type="button" class="close" data-dismiss="alert" style="margin-top: -3px;"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <strong>Form Surat Pengajuan</strong>
                    </div> --}}
                    @endif

                    @if(session()->get('error'))
                    <div class="alert alert-block" data-dismiss="alert" data-aos="fade-up" data-aos-duration="1000" style="background: rgba(3, 121, 3, 0.582);">
                        <button type="button" class="close" data-dismiss="alert" style="margin-top: -3px;"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <strong>Data Penduduk</strong> {{ session()->get('error') }}.
                    </div>
                    @endif

                    <form action="{{ url("/search") }}" method="get">
                        @csrf
                        <div class="">
                            <button class="btn btn-white btn-outline-success" style="font-size: 12px;" type="submit">
                                Search <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-2">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="id_register" value="{{Request::get('id_register')}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="ID Register">
                                </div>
                            </div>


                            <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input name="nama" value="{{Request::get('nama')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nama masyarakat">
                                    </div>
                            </div>

                            <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input type="number" name="nik" value="{{Request::get('nik')}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="NIK Masyarakat">
                                    </div>
                            </div>

                            <div class="col-md-2">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="banjar" value="{{Request::get('banjar')}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Banjar Masyarakat">
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

                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr class="font-table">
                                <th>NO</th>
                                <th>ID Register</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Banjar</th>
                                <th>Alamat</th>
                                <th class="text-right">Ditambahkan</th>
                                <th>Terakhir di Ubah</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($penduduk as $data)
                            @if ($data->value == '1')                
                            <tr class="font-table">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->id_register }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->banjar }}</td>
                                <td style="width: 200px;">{{ $data->alamat }}</td>
                                <td class="text-right">{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                <td>{{ date('d M, Y', strtotime($data->updated_at)) }}</td>
                                <td class="text-right">
                                    <div class="table-data-feature">
                                        <a type="button" data-toggle="modal" data-target="#editmasyarakat{{$data->id_register}}" class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer;">
                                            <i class="fas fa-pen text-center ml-1 mr-1"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            @else
                            <tr class="font-table bg-danger text-light">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->id_register }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->banjar }}</td>
                                <td style="width: 200px;">{{ $data->alamat }}</td>
                                <td class="text-right">{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                <td>{{ date('d M, Y', strtotime($data->updated_at)) }}</td>
                                <td class="text-right">
                                    <div class="table-data-feature">
                                        <a type="button" data-toggle="modal" data-target="#editmasyarakat{{$data->id_register}}" class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer;">
                                            <i class="fas fa-pen text-center ml-1 mr-1"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>

                            @endif

                            <!--Start Modal Edit-->
                            <div class="modal fade" id="editmasyarakat{{$data->id_register}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Masyarakat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/datapenduduk/update/{{$data->id_register}}"" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="mb-1">
                                            <label for="nik" class="col-form-label font-label">NIK:</label>
                                            <input type="number" class="form-control" id="nik" name="nik" value="{{ $data->nik }}" readonly>
                                        </div>

                                        <div class="mb-1">
                                            <label for="no_kk" class="col-form-label font-label">No KK:</label>
                                            <input type="number" class="form-control" id="no_kk" name="no_kk" value="{{ $data->no_kk }}" readonly>
                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label for="nama" class="col-form-label font-label">Nama:</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $data->tgl_lahir }}">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                                <select name="gender" class="form-control" id="">
                                                    <option value="{{ $data->gender }}">{{$data->gender}}</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="mb-1 col-md-4">
                                                <label for="banjar" class="col-form-label font-label">Banjar:</label>
                                                <input type="text" class="form-control" id="banjar" name="banjar" value="{{ $data->banjar }}">
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
                                            </div>

                                            <div class="mb-1 col-md-2">
                                                <label for="value" class="col-form-label font-label">Status:</label>
                                                <select name="value" class="form-control" required>
                                                    <option value="" disabled>--Pilih Status--</option>
                                                    <option value="{{ $data->value }}">@if ($data->value == '1')
                                                        Aktif
                                                        @else
                                                        Nonaktif
                                                        @endif
                                                    </option>
                                                    
                                                    @if ($data->value == '1')
                                                    <option value="0">Nonaktif</option>
                                                    @elseif($data->value == '0')  
                                                    <option value="1">Aktif</option>
                                                    @endif
                                                    
                                                </select>
                                            </div>

                                        </div>

                                        <div class="row d-none">
                                            <div class="mb-1 col-md-3">
                                                <label for="desa" class="col-form-label font-label">Desa:</label>
                                                <input type="hidden" class="form-control" id="desa" name="desa" value="{{$data->desa}}">
                                                <input type="text" class="form-control" id="desa" name="desa" value="{{$data->desa}}" disabled>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="kec" class="col-form-label font-label">Kecamatan:</label>
                                                <input type="hidden" class="form-control" id="kec" name="kec" value="{{$data->kec}}">
                                                <input type="text" class="form-control" id="kec" name="kec" value="{{$data->kec}}" disabled>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="kab" class="col-form-label font-label">Kabupaten:</label>
                                                <input type="hidden" class="form-control" id="kab" name="kab" value="{{$data->kab}}">
                                                <input type="text" class="form-control" id="kab" name="kab" value="{{$data->kab}}" disabled>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="provinsi" class="col-form-label font-label">Provinsi:</label>
                                                <input type="hidden" class="form-control" id="provinsi" name="provinsi" value="{{$data->provinsi}}">
                                                <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{$data->provinsi}}" disabled>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="negara" class="col-form-label font-label">Kewarganegaraan:</label>
                                                <input type="hidden" class="form-control" id="negara" name="negara" value="{{$data->negara}}">
                                                <input type="text" class="form-control" id="negara" name="negara" value="{{$data->negara}}" disabled>
                                            </div>

                                            <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d'); ?>" id="">

                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <label for="pendidikan" class="col-form-label font-label">Pendidikan Terakhir:</label>
                                                <select name="pendidikan" class="form-control" id="">
                                                    <option value=" " disabled>--Pilih Pendidikan Terakhir--</option>
                                                    <option value="{{ $data->pendidikan }}">
                                                    @if ($data->pendidikan == 'SD')
                                                    Sekolah Dasar    
                                                    @elseif($data->pendidikan == 'SMP')
                                                    Sekolah Menengah Pertama
                                                    @elseif($data->pendidikan == 'SMA')
                                                    Sekolah Menengah Keatas 
                                                    @elseif($data->pendidikan == 'Diploma')
                                                    Diploma    
                                                    @elseif($data->pendidikan == 'S1')
                                                    S1    
                                                    @elseif($data->pendidikan == 'S2')
                                                    S2    
                                                    @elseif($data->pendidikan == 'S3')
                                                    S3    
                                                    @endif
                                                    </option>
                                                    
                                                    @if ($data->pendidikan == 'SD')    
                                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                                    <option value="SMA">Sekolah Menengah Keatas</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                    @elseif($data->pendidikan == 'SMP')
                                                    <option value="SD">Sekolah Dasar</option>
                                                    <option value="SMA">Sekolah Menengah Keatas</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                    @elseif($data->pendidikan == 'SMA')
                                                    <option value="SD">Sekolah Dasar</option>
                                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                    @elseif($data->pendidikan == 'Diploma')
                                                    <option value="SD">Sekolah Dasar</option>
                                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                                    <option value="SMA">Sekolah Menengah Keatas</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                    @elseif($data->pendidikan == 'S1')
                                                    <option value="SD">Sekolah Dasar</option>
                                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                                    <option value="SMA">Sekolah Menengah Keatas</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                    @elseif($data->pendidikan == 'S2')
                                                    <option value="SD">Sekolah Dasar</option>
                                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                                    <option value="SMA">Sekolah Menengah Keatas</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S3">S3</option>
                                                    @elseif($data->pendidikan == 'S3')
                                                    <option value="SD">Sekolah Dasar</option>
                                                    <option value="SMP">Sekolah Menengah Pertama</option>
                                                    <option value="SMA">Sekolah Menengah Keatas</option>
                                                    <option value="Diploma">Diploma</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <label for="provinsi" class="col-form-label font-label">Keterangan:</label>
                                                <textarea class="form-control" placeholder="Keterangan lainnya" name="keterangan">{{$data->keterangan}}</textarea>
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
                            <!--End Modal Edit-->

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
