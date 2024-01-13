@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Permohonan Surat Kurang Mampu</h1>
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

        @if(auth()->user()->role=="admin")
        <!-- Content Row -->
        <div class="row">

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

                    </div> 

                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Form Surat Permohonan</strong> {{ session()->get('success') }}.
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
                        <strong>Form Surat Pengajuan</strong> {{ session()->get('success') }}.
                    </div>
                    @endif  

                    <form action="{{ url("/suratpermohonankurangmampu/search") }}" method="get" >

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
                                    <input type="text"  name="banjar" value="{{Request::get('banjar')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Banjar Pengajuan">
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
                                <th>Banjar</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($surat as $data)
                            @if($data->jenis_surat =="kurang mampu")
                            <tr class="font-table">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kode_surat }}</td>
                                <td>{{ $data->nama }}</td>
                                @if ($data->keterangan == "")
                                <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                @else
                                <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                @endif           
                                <td>{{ $data->banjar }}</td> 
                                <td class="text-capitalize">{{ $data->jenis_surat }}</td>               
                                <td>{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                
                                <td class="text-left">
                                    <div class="table-data-feature" style="margin-top: -5px;">
                                        
                                        <a href="/surat-permohonan-kurang-mampu/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                            <i class="fas fa-eye text-center text-dark"></i>
                                        </a>

                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                            <i class="fas fa-print"></i>
                                        </a> 

                                    </div>
                                </td>
                            </tr>

                            @endif
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        @endif

        @if(auth()->user()->role=="pegawai")
        <!-- Content Row -->
        <div class="row">

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

                    </div> 

                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Form Surat Permohonan</strong> {{ session()->get('success') }}.
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
                        <strong>Form Surat Pengajuan</strong> {{ session()->get('success') }}.
                    </div>
                    @endif  

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr class="font-table">
                                <th>NO</th>
                                <th>Kode Surat</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Banjar</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($surat as $data)
                            @if($data->jenis_surat =="kurang mampu")
                            <tr class="font-table">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kode_surat }}</td>
                                <td>{{ $data->nama }}</td>
                                @if ($data->keterangan == "")
                                <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                @else
                                <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                @endif           
                                <td>{{ $data->banjar }}</td> 
                                <td class="text-capitalize">{{ $data->jenis_surat }}</td>               
                                <td>{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                
                                <td class="text-left">
                                    <div class="table-data-feature" style="margin-top: -5px;">
                                        
                                        <a href="/surat-permohonan-kurang-mampu/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                            <i class="fas fa-eye text-center text-dark"></i>
                                        </a>

                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                            <i class="fas fa-print"></i>
                                        </a> 

                                    </div>
                                </td>
                            </tr>

                            @endif
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        @endif

        @if(auth()->user()->role=="masyarakat")
        <!-- Content Row -->
        <div class="row">

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

                    </div> 

                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Form Surat Permohonan</strong> {{ session()->get('success') }}.
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
                        <strong>Form Surat Pengajuan</strong> {{ session()->get('success') }}.
                    </div>
                    @endif  

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr class="font-table">
                                <th>NO</th>
                                <th>Kode Surat</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Banjar</th>
                                <th>Jenis Surat</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($surat as $data)
                            @if($data->id_register == auth()->user()->id_register )
                            <tr class="font-table">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kode_surat }}</td>
                                <td>{{ $data->nama }}</td>
                                @if ($data->keterangan == "")
                                <td style="width: 250px" class="text-truncate">Belum ada keterangan yang di isi</td>  
                                @else
                                <td style="width: 250px" class="text-truncate">{{ $data->keterangan }}</td> 
                                @endif           
                                <td>{{ $data->banjar }}</td> 
                                <td class="text-capitalize">{{ $data->jenis_surat }}</td>               
                                <td>{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                
                                <td class="text-left">
                                    <div class="table-data-feature" style="margin-top: -5px;">
                                        
                                        <a href="/surat-permohonan-kurang-mampu/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                            <i class="fas fa-eye text-center text-dark"></i>
                                        </a>

                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                            <i class="fas fa-print"></i>
                                        </a> 

                                    </div>
                                </td>
                            </tr>

                            @endif
                            @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        @endif

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