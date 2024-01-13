@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pengajuan Surat Kurang Mampu</h1>
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





        {{-- //////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////tampilam Admin////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////// --}}
        @if(auth()->user()->role=="admin")
            <!-- Content Row -->
            <div class="row">

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Surat Pengajuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengajuan->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-file-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Permohonan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Penduduk Kurang Mampu
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $surat->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-male fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

            <!-- Content Row -->


            <div class="">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    
                    <div class="card-body">
                        <div class="justify-content-between d-flex">
                            <div class="d-flex">
                                <div class="d-flex mb-2">
                                    <a href="{{ route('suratpengajuankurangmampu') }}" class="mr-2 btn btn-primary" style="font-size: 12px;">Pengajuan Surat</a>
                                </div>

                                <div class="d-flex mb-2">
                                    <a href="{{ route('permohonankurangmampu') }}" class="mr-2 btn btn-success" style="font-size: 12px;">Surat Permohonan</a>
                                </div>
                            </div>

                            <div>
                                <a type="button" data-toggle="modal" data-target="#tambahdata" class="btn btn-secondary" style="font-size: 12px;">Buat Surat Permohonan<i class="far fa-file-alt"></i></a>
                            </div>

                            <!--Start Modal Tambah-->
                            <div class="modal fade" id="tambahdata" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Form Pengajuan Surat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/suratpengajuankurangmampu/store5" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">   
                                        <div class="mb-3">
                                            <input type="reset" value="Reset" class="btn btn-warning text-dark float-right">
                                        </div>                         
                                        <div class="mb-1 d-none">
                                            <input type="number" class="form-control" name="id" value="{{ $idbaru }}">
                                        </div>

                                        <div class="mb-1 d-none">
                                            <label for="kode" class="col-form-label font-label">Kode:</label>
                                            <input type="text" class="form-control" id="kode" name="kode_surat" value="{{ $kode }}">
                                        </div>
                                        
                                        <div class="mb-1 d-none">
                                            <label for="id_register" class="col-form-label font-label">id:</label>
                                            <input type="text" class="form-control" id="id_register" name="id_register" readonly>
                                        </div>

                                        <div class="mb-1">
                                            <label for="NIK" class="col-form-label font-label">NIK:</label>
                                            <input type="text" class="form-control" id="nik" name="nik" required placeholder="NIK anda">
                                        </div>

                                        <div class="mb-1">
                                            <label for="no_kk" class="col-form-label font-label">No KK:</label>
                                            <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="No. KK anda">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label for="nama" class="col-form-label font-label">Nama:</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Lengkap">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="tempat_lahir" class="col-form-label font-label">Tempat Lahir:</label>
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required placeholder="Tempat lahir">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-3">
                                                <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                                <input type="text" class="form-control" id="gender" name="gender" placeholder="Jenis Kelamin">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="agama" class="col-form-label font-label">Agama:</label>
                                                <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="Pekerjaan" class="col-form-label font-label">Pekerjaan:</label>
                                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="perkawinan" class="col-form-label font-label">Status Perkawinan:</label>
                                                <input type="text" class="form-control" id="status_pernikahan" name="status_perkawinan" placeholder="Status Perkawinan">
                                            </div>
                                        </div>

                                        <div class="row d-none">
                                            <div class="mb-1 col-md-3">
                                                <label for="kec" class="col-form-label font-label">Kecamatan:</label>
                                                <input type="text" class="form-control" id="kec" name="kec" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="kab" class="col-form-label font-label">Kabupaten:</label>
                                                <input type="text" class="form-control" id="kab" name="kab" readonly> 
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="desa" class="col-form-label font-label">Desa:</label>
                                                <input type="text" class="form-control" id="desa" name="desa" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="provinsi" class="col-form-label font-label">Provinsi:</label>
                                                <input type="text" class="form-control" id="provinsi" name="provinsi" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="negara" class="col-form-label font-label">Kewarganegaraan:</label>
                                                <input type="text" class="form-control" id="negara" name="negara" readonly>
                                            </div>

                                            <input type="text" name="jenis_surat" value="kurang mampu" id="">
                                            <input type="text" name="value" value="1" id="">
                                            <input type="text" name="jenis" value="1" id="">
                                        </div>

                                        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>">

                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                                <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat"></textarea>
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <label for="keterangan" class="col-form-label font-label">Keterangan:</label>
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
                            <strong>Form Surat Pengajuan</strong> {{ session()->get('success') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        @endif 
                        
                        @if(session()->get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Form Surat Pengajuan</strong> {{ session()->get('success') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        @endif
                        
                        @if(session()->get('konfirmasi'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Form Surat Pengajuan</strong> {{ session()->get('konfirmasi') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        @endif  

                        

                        <form action="{{ url("/suratpengajuankurangmampu/search") }}" method="get" >

                            <div class="row mt-4">

                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        <input name="kode_surat" value="{{Request::get('kode_surat')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Kode Surat">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <input type="text"  name="nama" value="{{Request::get('nama')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nama Pengajuan">
                                    </div>
                                </div>
    
                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        {{-- <input type="text"  name="value" value="{{Request::get('value')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Status"> --}}
                                        <select type="text" class="form-control" placeholder="Status" aria-label="search" aria-describedby="search" value="{{Request::get('value')}}" name="value">
                                            <option selected class="dropdown-menu" disabled>Status</option>
                                            <option value="0" class="dropdown-item" name="value">Semua</option>
                                            <option value="1" class="dropdown-item" name="value">Diproses</option>
                                            <option value="2" class="dropdown-item" name="value">Diselesaikan</option>
                                            <option value="3" class="dropdown-item" name="value">Dikonfirmasi</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        <input type="date"  name="created_at" value="{{Request::get('created_at')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </div>
    
    
                                <div class="col-lg-2">
                                    <button class="btn btn-white btn-outline-success" style="font-size: 13px;" type="submit">
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
                                        <th>Kode Surat</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Jenis Surat</th>
                                        <th>Status</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($pengajuan as $data)
                                    @if($data->jenis_surat =="kurang mampu")
                                    @if($data->value == '1')
                                        <tr class="font-table">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif           
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
    
                                            <td>Diproses <i class="fas fa-spinner"></i></td>
    
                                            <td class="text-right">
                                                <div class="table-data-feature">
                                                    
                                                    <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                        <i class="fas fa-eye text-center text-dark"></i>
                                                    </a>
    
                                                    <a type="button" data-toggle="modal" data-target="#konfirmasi{{$data->id}}" class="item bg-danger p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a> 
    
                                                    <a type="button" data-toggle="modal" data-target="#selesaikan{{$data->id}}" class="item bg-primary p-1 text-white" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                        <i class="fas fa-check"></i>
                                                    </a> 
    
                                                </div>
                                            </td>
                                        </tr>
                                    @elseif($data->value == '2')
                                        <tr class="font-table bg-success text-light">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif         
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
                           
                                            <td>Disetujui <i class="fas fa-check"></i></td>


                                            <td class="d-flex justify-content-end">
                                                <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-warning p-1 text-dark text-end mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-eye text-center text-dark"></i>
                                                </a>                 
                                            </td>

                                        </tr>
                                    @else
                                        <tr class="font-table bg-danger text-light">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif         
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
                                            
                                            <td>Dikonfirmasi <i class="fas fa-info-circle"></i></td>
    
                                            <td class="text-right">
                                                <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-warning p-1 text-dark text-end mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-eye text-center text-dark"></i>
                                                </a>

                                                <a type="button" data-toggle="modal" data-target="#dikonfirmasi{{$data->id}}" class="item bg-white p-1 text-danger mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr> 
                                    @endif

                                    {{-- START MODAL KONFIRMASI PENGAJUAN SURAT MASYARAKAT--}}
                                    <div class="modal fade" id="dikonfirmasi{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Surat Pengajuan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">                            
                                
                                                    <div class="mb-1 col-md-12">
                                                        <h5>Konfirmasi kekurangan data penduduk</h5>
                                                        <label for="Konfirmasi" class="col-form-label font-label">Konfirmasi:</label>
                                                        <textarea class="form-control" placeholder="Konfirmasi data penduduk" name="konfirmasi" readonly>{{ $data->konfirmasi }}</textarea>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MODAL KONFIRMASI PENGAJUAN SURAT MASYARAKAT--}}

                                {{-- start Konfirmasi --}}
                                <div class="modal fade" id="konfirmasi{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Surat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                        </div>
                                        <form action="/suratpengajuankurangmampu/konfirmasi/{{ $data->id}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">                            
                        
                                            <div class="mb-1 col-md-12">
                                                <h5>Konfirmasi kekurangan data penduduk</h5>
                                                <label for="Konfirmasi" class="col-form-label font-label">Konfirmasi:</label>
                                                <textarea class="form-control" placeholder="Konfirmasi data penduduk" name="konfirmasi"></textarea>
                                            </div>
                                            
                                            <div class="d-none">
                                                <input type="text" name="value" value="3">         
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
                                {{-- end --}}

                                
                                <!--Start Modal selesaikan-->
                                <div class="modal fade" id="selesaikan{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Selesaikan Surat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                        </div>
                                        <form action="/suratpengajuankurangmampu/setuju2/{{ $data->id}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">                            
                                            <h5>Yakin ingin menyelesaikan pengajuan ini?</h5>
                                            <div class="d-none">
                                            <div class="d-none">
                                                <div class="mb-1">
                                                    <input type="number" class="form-control" name="id_surat" value="{{ $idbaru1 }}">
                                                </div>
            
                                                <div class="mb-1">
                                                    <label for="kode" class="col-form-label font-label">Kode:</label>
                                                    <input type="text" class="form-control" id="kode" name="kode_surat" value="{{ $kode1 }}">
                                                </div>
                                                
                                                <div class="mb-1 d-none">
                                                    <label for="id_register" class="col-form-label font-label">id:</label>
                                                    <input type="text" class="form-control" id="id_register" name="id_register" readonly value="{{ $data->id_register }}">
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="NIK" class="col-form-label font-label">NIK:</label>
                                                <input type="text" class="form-control" id="nik" name="nik" required placeholder="NIK anda" value="{{ $data->nik }}" readonly>
                                            </div>

                                            <div class="mb-1">
                                                <label for="no_kk" class="col-form-label font-label">No KK:</label>
                                                <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="No. KK anda" value="{{ $data->no_kk }}" readonly>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="mb-1 col-md-6">
                                                    <label for="nama" class="col-form-label font-label">Nama:</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Lengkap" value="{{ $data->nama }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="tempat_lahir" class="col-form-label font-label">Tempat Lahir:</label>
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required placeholder="Tempat lahir" value="{{ $data->tempat_lahir }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $data->tgl_lahir }}" readonly>
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="mb-1 col-md-3">
                                                    <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Jenis Kelamin" value="{{ $data->gender }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="agama" class="col-form-label font-label">Agama:</label>
                                                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" value="{{ $data->agama }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="Pekerjaan" class="col-form-label font-label">Pekerjaan:</label>
                                                    <input type="text" class="form-control" id="Pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="{{ $data->pekerjaan }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="perkawinan" class="col-form-label font-label">Status Perkawinan:</label>
                                                    <input type="text" class="form-control" id="perkawinan" name="status_perkawinan" placeholder="Status Perkawinan" value="{{ $data->status_perkawinan }}" readonly>
                                                </div>
                                            </div>

                                            <div class="row d-none">
                                                <div class="mb-1 col-md-3">
                                                    <label for="kec" class="col-form-label font-label">Kecamatan:</label>
                                                    <input type="text" class="form-control" id="kec" name="kec" readonly value="{{ $data->kec }}">
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="kab" class="col-form-label font-label">Kabupaten:</label>
                                                    <input type="text" class="form-control" id="kab" name="kab" readonly value="{{ $data->kab }}">  
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="desa" class="col-form-label font-label">Desa:</label>
                                                    <input type="text" class="form-control" id="desa" name="desa" readonly value="{{ $data->desa }}">
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="provinsi" class="col-form-label font-label">Provinsi:</label>
                                                    <input type="text" class="form-control" id="provinsi" name="provinsi" readonly value="{{ $data->provinsi }}">
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="negara" class="col-form-label font-label">Kewarganegaraan:</label>
                                                    <input type="text" class="form-control" id="negara" name="negara" readonly value="{{ $data->negara }}">
                                                </div>

                                                <input type="text" name="jenis_surat" value="kurang mampu" id="">
                                                <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>">
                                            </div>

                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                                    <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat" readonly>{{ $data->alamat }}</textarea>
                                                </div>

                                                <div class="mb-1 col-md-12">
                                                    <label for="keterangan" class="col-form-label font-label">Keterangan:</label>
                                                    <textarea class="form-control" placeholder="Keterangan lainnya" name="keterangan">{{ $data->keterangan }}</textarea>
                                                </div>
                                                
                                                <div class="d-none">
                                                    <input type="text" name="value" value="2">         
                                                    <input type="text" name="jenis" value="2">
                                                </div>

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
                                <!--End Modal selesaikan-->

                                @endif
                                @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        @endif
        {{-- //////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////tampilam Admin////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////// --}}    







        {{-- //////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////tampilam PEGAWAI//////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////// --}}
        @if(auth()->user()->role=="pegawai")
            <!-- Content Row -->
            <div class="row">

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Surat Pengajuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengajuan->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-file-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Permohonan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Penduduk Kurang Mampu
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $surat->count() }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-male fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>

            <!-- Content Row -->


            <div class="">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    
                    <div class="card-body">
                        <div class="justify-content-between d-flex">
                            <div class="d-flex">
                                <div class="d-flex mb-2">
                                    <a href="{{ route('suratpengajuankurangmampu') }}" class="mr-2 btn btn-primary" style="font-size: 12px;">Pengajuan Surat</a>
                                </div>

                                <div class="d-flex mb-2">
                                    <a href="{{ route('permohonankurangmampu') }}" class="mr-2 btn btn-success" style="font-size: 12px;">Surat Permohonan</a>
                                </div>
                            </div>

                            <div>
                                <a type="button" data-toggle="modal" data-target="#tambahdata" class="btn btn-secondary" style="font-size: 12px;">Buat Surat Permohonan<i class="far fa-file-alt"></i></a>
                            </div>

                            <!--Start Modal Tambah-->
                            <div class="modal fade" id="tambahdata" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Form Pengajuan Surat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/suratpengajuankurangmampu/store5" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">   
                                        <div class="mb-3">
                                            <input type="reset" value="Reset" class="btn btn-warning text-dark float-right">
                                        </div>                         
                                        <div class="mb-1 d-none">
                                            <input type="number" class="form-control" name="id" value="{{ $idbaru }}">
                                        </div>

                                        <div class="mb-1 d-none">
                                            <label for="kode" class="col-form-label font-label">Kode:</label>
                                            <input type="text" class="form-control" id="kode" name="kode_surat" value="{{ $kode }}">
                                        </div>
                                        
                                        <div class="mb-1 d-none">
                                            <label for="id_register" class="col-form-label font-label">id:</label>
                                            <input type="text" class="form-control" id="id_register" name="id_register" readonly>
                                        </div>

                                        <div class="mb-1">
                                            <label for="NIK" class="col-form-label font-label">NIK:</label>
                                            <input type="text" class="form-control" id="nik" name="nik" required placeholder="NIK anda">
                                        </div>

                                        <div class="mb-1">
                                            <label for="no_kk" class="col-form-label font-label">No KK:</label>
                                            <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="No. KK anda">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label for="nama" class="col-form-label font-label">Nama:</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Lengkap">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="tempat_lahir" class="col-form-label font-label">Tempat Lahir:</label>
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required placeholder="Tempat lahir">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-3">
                                                <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                                <input type="text" class="form-control" id="gender" name="gender" placeholder="Jenis Kelamin">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="agama" class="col-form-label font-label">Agama:</label>
                                                <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="Pekerjaan" class="col-form-label font-label">Pekerjaan:</label>
                                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="perkawinan" class="col-form-label font-label">Status Perkawinan:</label>
                                                <input type="text" class="form-control" id="status_pernikahan" name="status_perkawinan" placeholder="Status Perkawinan">
                                            </div>
                                        </div>

                                        <div class="row d-none">
                                            <div class="mb-1 col-md-3">
                                                <label for="kec" class="col-form-label font-label">Kecamatan:</label>
                                                <input type="text" class="form-control" id="kec" name="kec" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="kab" class="col-form-label font-label">Kabupaten:</label>
                                                <input type="text" class="form-control" id="kab" name="kab" readonly> 
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="desa" class="col-form-label font-label">Desa:</label>
                                                <input type="text" class="form-control" id="desa" name="desa" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="provinsi" class="col-form-label font-label">Provinsi:</label>
                                                <input type="text" class="form-control" id="provinsi" name="provinsi" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="negara" class="col-form-label font-label">Kewarganegaraan:</label>
                                                <input type="text" class="form-control" id="negara" name="negara" readonly>
                                            </div>

                                            <input type="text" name="jenis_surat" value="kurang mampu" id="">
                                            <input type="text" name="value" value="1" id="">
                                            <input type="text" name="jenis" value="1" id="">
                                        </div>

                                        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>">

                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                                <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat"></textarea>
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <label for="keterangan" class="col-form-label font-label">Keterangan:</label>
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
                            <strong>Form Surat Pengajuan</strong> {{ session()->get('success') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        @endif 
                        
                        @if(session()->get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Form Surat Pengajuan</strong> {{ session()->get('success') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        @endif
                        
                        @if(session()->get('konfirmasi'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Form Surat Pengajuan</strong> {{ session()->get('konfirmasi') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        @endif  

                        

                        <form action="{{ url("/suratpengajuankurangmampu/search") }}" method="get" >

                            <div class="row mt-4">

                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        <input name="kode_surat" value="{{Request::get('kode_surat')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Kode Surat">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <input type="text"  name="nama" value="{{Request::get('nama')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nama Pengajuan">
                                    </div>
                                </div>
    
                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        {{-- <input type="text"  name="value" value="{{Request::get('value')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Status"> --}}
                                        <select type="text" class="form-control" placeholder="Status" aria-label="search" aria-describedby="search" value="{{Request::get('value')}}" name="value">
                                            <option selected class="dropdown-menu" disabled>Status</option>
                                            <option value="0" class="dropdown-item" name="value">Semua</option>
                                            <option value="1" class="dropdown-item" name="value">Diproses</option>
                                            <option value="2" class="dropdown-item" name="value">Diselesaikan</option>
                                            <option value="3" class="dropdown-item" name="value">Dikonfirmasi</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        <input type="date"  name="created_at" value="{{Request::get('created_at')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </div>
    
    
                                <div class="col-lg-2">
                                    <button class="btn btn-white btn-outline-success" style="font-size: 13px;" type="submit">
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
                                        <th>Kode Surat</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Jenis Surat</th>
                                        <th>Status</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($pengajuan as $data)
                                    @if($data->jenis_surat =="kurang mampu")
                                    @if($data->value == '1')
                                        <tr class="font-table">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif           
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
    
                                            <td>Diproses <i class="fas fa-spinner"></i></td>
    
                                            <td class="text-right">
                                                <div class="table-data-feature">
                                                    
                                                    <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                        <i class="fas fa-eye text-center text-dark"></i>
                                                    </a>
    
                                                    <a type="button" data-toggle="modal" data-target="#konfirmasi{{$data->id}}" class="item bg-danger p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a> 
    
                                                    <a type="button" data-toggle="modal" data-target="#selesaikan{{$data->id}}" class="item bg-primary p-1 text-white" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                        <i class="fas fa-check"></i>
                                                    </a> 
    
                                                </div>
                                            </td>
                                        </tr>
                                    @elseif($data->value == '2')
                                        <tr class="font-table bg-success text-light">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif         
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
                           
                                            <td>Disetujui <i class="fas fa-check"></i></td>


                                            <td class="d-flex justify-content-end">
                                                <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-warning p-1 text-dark text-end mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-eye text-center text-dark"></i>
                                                </a>                 
                                            </td>

                                        </tr>
                                    @else
                                        <tr class="font-table bg-danger text-light">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif         
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
                                            
                                            <td>Dikonfirmasi <i class="fas fa-info-circle"></i></td>
    
                                            <td class="text-right">
                                                <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-warning p-1 text-dark text-end mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-eye text-center text-dark"></i>
                                                </a>

                                                <a type="button" data-toggle="modal" data-target="#dikonfirmasi{{$data->id}}" class="item bg-white p-1 text-danger mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </td>
                                        </tr> 
                                    @endif

                                    {{-- START MODAL KONFIRMASI PENGAJUAN SURAT MASYARAKAT--}}
                                    <div class="modal fade" id="dikonfirmasi{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Surat Pengajuan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">                            
                                
                                                    <div class="mb-1 col-md-12">
                                                        <h5>Konfirmasi kekurangan data penduduk</h5>
                                                        <label for="Konfirmasi" class="col-form-label font-label">Konfirmasi:</label>
                                                        <textarea class="form-control" placeholder="Konfirmasi data penduduk" name="konfirmasi" readonly>{{ $data->konfirmasi }}</textarea>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MODAL KONFIRMASI PENGAJUAN SURAT MASYARAKAT--}}

                                {{-- start Konfirmasi --}}
                                <div class="modal fade" id="konfirmasi{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Surat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                        </div>
                                        <form action="/suratpengajuankurangmampu/konfirmasi/{{ $data->id}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">                            
                        
                                            <div class="mb-1 col-md-12">
                                                <h5>Konfirmasi kekurangan data penduduk</h5>
                                                <label for="Konfirmasi" class="col-form-label font-label">Konfirmasi:</label>
                                                <textarea class="form-control" placeholder="Konfirmasi data penduduk" name="konfirmasi"></textarea>
                                            </div>
                                            
                                            <div class="d-none">
                                                <input type="text" name="value" value="3">         
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
                                {{-- end --}}

                                
                                <!--Start Modal selesaikan-->
                                <div class="modal fade" id="selesaikan{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Selesaikan Surat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                        </div>
                                        <form action="/suratpengajuankurangmampu/setuju2/{{ $data->id}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">                            
                                            <h5>Yakin ingin menyelesaikan pengajuan ini?</h5>
                                            <div class="d-none">
                                            <div class="d-none">
                                                <div class="mb-1">
                                                    <input type="number" class="form-control" name="id_surat" value="{{ $idbaru1 }}">
                                                </div>
            
                                                <div class="mb-1">
                                                    <label for="kode" class="col-form-label font-label">Kode:</label>
                                                    <input type="text" class="form-control" id="kode" name="kode_surat" value="{{ $kode1 }}">
                                                </div>
                                                
                                                <div class="mb-1 d-none">
                                                    <label for="id_register" class="col-form-label font-label">id:</label>
                                                    <input type="text" class="form-control" id="id_register" name="id_register" readonly value="{{ $data->id_register }}">
                                                </div>
                                            </div>

                                            <div class="mb-1">
                                                <label for="NIK" class="col-form-label font-label">NIK:</label>
                                                <input type="text" class="form-control" id="nik" name="nik" required placeholder="NIK anda" value="{{ $data->nik }}" readonly>
                                            </div>

                                            <div class="mb-1">
                                                <label for="no_kk" class="col-form-label font-label">No KK:</label>
                                                <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="No. KK anda" value="{{ $data->no_kk }}" readonly>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="mb-1 col-md-6">
                                                    <label for="nama" class="col-form-label font-label">Nama:</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Lengkap" value="{{ $data->nama }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="tempat_lahir" class="col-form-label font-label">Tempat Lahir:</label>
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required placeholder="Tempat lahir" value="{{ $data->tempat_lahir }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $data->tgl_lahir }}" readonly>
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="mb-1 col-md-3">
                                                    <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                                    <input type="text" class="form-control" id="gender" name="gender" placeholder="Jenis Kelamin" value="{{ $data->gender }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="agama" class="col-form-label font-label">Agama:</label>
                                                    <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama" value="{{ $data->agama }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="Pekerjaan" class="col-form-label font-label">Pekerjaan:</label>
                                                    <input type="text" class="form-control" id="Pekerjaan" name="pekerjaan" placeholder="Pekerjaan" value="{{ $data->pekerjaan }}" readonly>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="perkawinan" class="col-form-label font-label">Status Perkawinan:</label>
                                                    <input type="text" class="form-control" id="perkawinan" name="status_perkawinan" placeholder="Status Perkawinan" value="{{ $data->status_perkawinan }}" readonly>
                                                </div>
                                            </div>

                                            <div class="row d-none">
                                                <div class="mb-1 col-md-3">
                                                    <label for="kec" class="col-form-label font-label">Kecamatan:</label>
                                                    <input type="text" class="form-control" id="kec" name="kec" readonly value="{{ $data->kec }}">
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="kab" class="col-form-label font-label">Kabupaten:</label>
                                                    <input type="text" class="form-control" id="kab" name="kab" readonly value="{{ $data->kab }}">  
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="desa" class="col-form-label font-label">Desa:</label>
                                                    <input type="text" class="form-control" id="desa" name="desa" readonly value="{{ $data->desa }}">
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="provinsi" class="col-form-label font-label">Provinsi:</label>
                                                    <input type="text" class="form-control" id="provinsi" name="provinsi" readonly value="{{ $data->provinsi }}">
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label for="negara" class="col-form-label font-label">Kewarganegaraan:</label>
                                                    <input type="text" class="form-control" id="negara" name="negara" readonly value="{{ $data->negara }}">
                                                </div>

                                                <input type="text" name="jenis_surat" value="kurang mampu" id="">
                                                <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>">
                                            </div>

                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                                    <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat" readonly>{{ $data->alamat }}</textarea>
                                                </div>

                                                <div class="mb-1 col-md-12">
                                                    <label for="keterangan" class="col-form-label font-label">Keterangan:</label>
                                                    <textarea class="form-control" placeholder="Keterangan lainnya" name="keterangan">{{ $data->keterangan }}</textarea>
                                                </div>
                                                
                                                <div class="d-none">
                                                    <input type="text" name="value" value="2">         
                                                    <input type="text" name="jenis" value="2">
                                                </div>

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
                                <!--End Modal selesaikan-->

                                @endif
                                @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        @endif
        {{-- //////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////tampilam PEGAWAI//////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////// --}}





        {{-- //////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////tampilam MASYARAKAT//////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////// --}}
        @if(auth()->user()->role=="masyarakat")
            <!-- Content Row -->
            <div class="row">

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Surat Pengajuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pengajuan1->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-file-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Permohonan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat1->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Content Row -->


            <div class="">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    
                    <div class="card-body">
                        <div class="justify-content-between d-flex">
                            <div class="d-flex">
                                <div class="d-flex mb-2">
                                    <a href="{{ route('suratpengajuankurangmampu') }}" class="mr-2 btn btn-primary" style="font-size: 12px;">Pengajuan Surat</a>
                                </div>

                                <div class="d-flex mb-2">
                                    <a href="{{ route('permohonankurangmampu') }}" class="mr-2 btn btn-success" style="font-size: 12px;">Surat Permohonan</a>
                                </div>
                            </div>

                            <div>
                                <a type="button" data-toggle="modal" data-target="#tambahdata" class="btn btn-secondary" style="font-size: 12px;">Buat Surat Permohonan<i class="far fa-file-alt"></i></a>
                            </div>

                            <!--Start Modal Tambah-->
                            <div class="modal fade" id="tambahdata" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Form Permohonan Surat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/suratpengajuankurangmampu/store5" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">   
                                        <div class="mb-3">
                                            <input type="reset" value="Reset" class="btn btn-warning text-dark float-right">
                                        </div>                         
                                        <div class="mb-1 d-none">
                                            <input type="number" class="form-control" name="id" value="{{ $idbaru }}">
                                        </div>

                                        <div class="mb-1 d-none">
                                            <label for="kode" class="col-form-label font-label">Kode:</label>
                                            <input type="text" class="form-control" id="kode" name="kode_surat" value="{{ $kode }}">
                                        </div>
                                        
                                        <div class="mb-1 d-none">
                                            <label for="id_register" class="col-form-label font-label">id:</label>
                                            <input type="text" class="form-control" name="id_register" value="{{ auth()->user()->id_register }}">
                                        </div>

                                        <div class="mb-1">
                                            <label for="NIK" class="col-form-label font-label">NIK:</label>
                                            <input type="text" class="form-control" id="nik" name="nik" required placeholder="NIK anda">
                                        </div>

                                        <div class="mb-1">
                                            <label for="no_kk" class="col-form-label font-label">No KK:</label>
                                            <input type="number" class="form-control" id="no_kk" name="no_kk" placeholder="No. KK anda">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label for="nama" class="col-form-label font-label">Nama:</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Lengkap">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="tempat_lahir" class="col-form-label font-label">Tempat Lahir:</label>
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required placeholder="Tempat lahir">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-3">
                                                <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                                <input type="text" class="form-control" id="gender" name="gender" placeholder="Jenis Kelamin">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="agama" class="col-form-label font-label">Agama:</label>
                                                <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="Pekerjaan" class="col-form-label font-label">Pekerjaan:</label>
                                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="perkawinan" class="col-form-label font-label">Status Perkawinan:</label>
                                                <input type="text" class="form-control" id="status_pernikahan" name="status_perkawinan" placeholder="Status Perkawinan">
                                            </div>
                                        </div>

                                        <div class="row d-none">
                                            <div class="mb-1 col-md-3">
                                                <label for="kec" class="col-form-label font-label">Kecamatan:</label>
                                                <input type="text" class="form-control" id="kec" name="kec" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="kab" class="col-form-label font-label">Kabupaten:</label>
                                                <input type="text" class="form-control" id="kab" name="kab" readonly> 
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="desa" class="col-form-label font-label">Desa:</label>
                                                <input type="text" class="form-control" id="desa" name="desa" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="provinsi" class="col-form-label font-label">Provinsi:</label>
                                                <input type="text" class="form-control" id="provinsi" name="provinsi" readonly>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="negara" class="col-form-label font-label">Kewarganegaraan:</label>
                                                <input type="text" class="form-control" id="negara" name="negara" readonly>
                                            </div>

                                            <input type="text" name="jenis_surat" value="kurang mampu" id="">
                                            <input type="text" name="value" value="1" id="">
                                            <input type="text" name="jenis" value="1" id="">
                                        </div>

                                        <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>">

                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                                <textarea class="form-control" placeholder="Alamat" name="alamat" id="alamat"></textarea>
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <label for="keterangan" class="col-form-label font-label">Keterangan:</label>
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
                            <strong>Form Surat Pengajuan</strong> {{ session()->get('success') }}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        @endif 
                        
                        @if(session()->get('error'))
                        <div class="alert alert-block" data-dismiss="alert" data-aos="fade-up" data-aos-duration="1000" style="background: rgba(3, 121, 3, 0.582);">
                            <button type="button" class="close" data-dismiss="alert" style="margin-top: -3px;"><i class="fa fa-times" aria-hidden="true"></i></button>
                            <strong>Form Surat Pengajuan</strong> {{ session()->get('error') }}.
                        </div>
                        @endif 
                        
                        
                        <form action="{{ url("/suratpengajuankurangmampu/search") }}" method="get" >

                            <div class="row mt-4">

                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        <input name="kode_surat" value="{{Request::get('kode_surat')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Kode Surat">
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm">
                                        <input type="text"  name="nama" value="{{Request::get('nama')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nama Pengajuan">
                                    </div>
                                </div>
    
                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        {{-- <input type="text"  name="value" value="{{Request::get('value')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Status"> --}}
                                        <select type="text" class="form-control" placeholder="Status" aria-label="search" aria-describedby="search" value="{{Request::get('value')}}" name="value">
                                            <option selected class="dropdown-menu" disabled>Status</option>
                                            <option value="0" class="dropdown-item" name="value">Semua</option>
                                            <option value="1" class="dropdown-item" name="value">Diproses</option>
                                            <option value="2" class="dropdown-item" name="value">Diselesaikan</option>
                                            <option value="3" class="dropdown-item" name="value">Dikonfirmasi</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-lg-2">
                                    <div class="input-group input-group-sm">
                                        <input type="date"  name="created_at" value="{{Request::get('created_at')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </div>
    
    
                                <div class="col-lg-2">
                                    <button class="btn btn-white btn-outline-success" style="font-size: 13px;" type="submit">
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
                                        <th>Kode Surat</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Jenis Surat</th>
                                        <th>Status</th>
                                        <th class="text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($pengajuan as $data)
                                    @if($data->id_register == auth()->user()->id_register)
                                    @if($data->value == '1')
                                        <tr class="font-table bg-warning text-light">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif           
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
    
                                            <td>Diproses <i class="fas fa-spinner"></i></td>
    
                                            <td class="text-right">
                                                <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-white p-1 text-warning text-end" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-eye text-center text-dark"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @elseif($data->value == '2')
                                        <tr class="font-table bg-success text-light">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif         
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
                                            
                                            <td>Diselesaikan <i class="fas fa-check"></i></td>
    
                                            <td class="text-right">
                                                <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-warning p-1 text-dark text-end" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-eye text-center text-dark"></i>
                                                </a>
                                            </td>
                           
                                        </tr>
                                    @else
                                        <tr class="font-table bg-danger text-light">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kode_surat }}</td>
                                            <td>{{ $data->nama }}</td>
                                            @if ($data->keterangan == "")
                                            <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                            @else
                                            <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                            @endif         
                                            <td>{{ date('M d Y', strtotime($data->created_at)) }}</td>
                                            <td class="text-capitalize">{{ $data->jenis_surat }}</td>      
                                            
                                            <td>Dikonfirmasi <i class="fas fa-info-circle"></i></td>
    
                                            <td class="text-right">
                                                <a href="/surat-pengajuan-kurang-mampu/{{$data->id}}" target="blank" class="item bg-warning p-1 text-dark text-end mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-eye text-center text-dark"></i>
                                                </a>

                                                <a type="button" data-toggle="modal" data-target="#dikonfirmasi{{$data->id}}" class="item bg-white p-1 text-danger mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                                    <i class="fas fa-info-circle text-center"></i>
                                                </a>
                                            </td>
                                        </tr> 
                                    @endif
                                    @endif

                                    {{-- START MODAL KONFIRMASI PENGAJUAN SURAT MASYARAKAT--}}
                                    <div class="modal fade" id="dikonfirmasi{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Surat Pengajuan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">                            
                                
                                                    <div class="mb-1 col-md-12">
                                                        <h5>Konfirmasi kekurangan data penduduk</h5>
                                                        <label for="Konfirmasi" class="col-form-label font-label">Konfirmasi:</label>
                                                        <textarea class="form-control" placeholder="Konfirmasi data penduduk" name="konfirmasi" readonly>{{ $data->konfirmasi }}</textarea>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MODAL KONFIRMASI PENGAJUAN SURAT MASYARAKAT--}}
                                    @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        @endif
        {{-- //////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////tampilam MASYARAKAT///////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////// --}}

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
                            $('#id_register').empty();
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
                            $('#nama').empty();
                            $.each(data, function(key, users){
                                $('#nama').val(users.nama);
                            });
                        }else{
                            $('#nama').empty();
                        }
                    }
                });
            }else{
                $('#nama').empty();
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
                            $('#tempat_lahir').empty();
                            $.each(data, function(key, users){
                                $('#tempat_lahir').val(users.tempat_lahir);
                            });
                        }else{
                            $('#tempat_lahir').empty();
                        }
                    }
                });
            }else{
                $('#tempat_lahir').empty();
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
                            $('#agama').empty();
                            $.each(data, function(key, users){
                                $('#agama').val(users.agama);
                            });
                        }else{
                            $('#agama').empty();
                        }
                    }
                });
            }else{
                $('#agama').empty();
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
                            $('#pekerjaan').empty();
                            $.each(data, function(key, users){
                                $('#pekerjaan').val(users.pekerjaan);
                            });
                        }else{
                            $('#pekerjaan').empty();
                        }
                    }
                });
            }else{
                $('#pekerjaan').empty();
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
                            $('#status_pernikahan').empty();
                            $.each(data, function(key, users){
                                $('#status_pernikahan').val(users.status_pernikahan);
                            });
                        }else{
                            $('#status_pernikahan').empty();
                        }
                    }
                });
            }else{
                $('#status_pernikahan').empty();
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
                            $('#no_kk').empty();
                            $.each(data, function(key, users){
                                $('#no_kk').val(users.no_kk);
                            });
                        }else{
                            $('#no_kk').empty();
                        }
                    }
                });
            }else{
                $('#no_kk').empty();
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
                            $('#tgl_lahir').empty();
                            $.each(data, function(key, users){
                                $('#tgl_lahir').val(users.tgl_lahir);
                            });
                        }else{
                            $('#tgl_lahir').empty();
                        }
                    }
                });
            }else{
                $('#tgl_lahir').empty();
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
                            $('#gender').empty();
                            $.each(data, function(key, users){
                                $('#gender').val(users.gender);
                            });
                        }else{
                            $('#gender').empty();
                        }
                    }
                });
            }else{
                $('#gender').empty();
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
                            $('#desa').empty();
                            $.each(data, function(key, users){
                                $('#desa').val(users.desa);
                            });
                        }else{
                            $('#desa').empty();
                        }
                    }
                });
            }else{
                $('#desa').empty();
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
                            $('#banjar').empty();
                            $.each(data, function(key, users){
                                $('#banjar').val(users.banjar);
                            });
                        }else{
                            $('#banjar').empty();
                        }
                    }
                });
            }else{
                $('#banjar').empty();
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
                            $('#kec').empty();
                            $.each(data, function(key, users){
                                $('#kec').val(users.kec);
                            });
                        }else{
                            $('#kec').empty();
                        }
                    }
                });
            }else{
                $('#kec').empty();
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
                            $('#kab').empty();
                            $.each(data, function(key, users){
                                $('#kab').val(users.kab);
                            });
                        }else{
                            $('#kab').empty();
                        }
                    }
                });
            }else{
                $('#kab').empty();
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
                            $('#provinsi').empty();
                            $.each(data, function(key, users){
                                $('#provinsi').val(users.provinsi);
                            });
                        }else{
                            $('#provinsi').empty();
                        }
                    }
                });
            }else{
                $('#provinsi').empty();
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
                            $('#negara').empty();
                            $.each(data, function(key, users){
                                $('#negara').val(users.negara);
                            });
                        }else{
                            $('#negara').empty();
                        }
                    }
                });
            }else{
                $('#negara').empty();
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
                            $('#alamat').empty();
                            $.each(data, function(key, users){
                                $('#alamat').val(users.alamat);
                            });
                        }else{
                            $('#alamat').empty();
                        }
                    }
                });
            }else{
                $('#alamat').empty();
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