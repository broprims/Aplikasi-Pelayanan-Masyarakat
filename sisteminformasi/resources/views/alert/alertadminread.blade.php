@extends('layouts.pagecontroll')

@section('content')

<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pesan Yang Sudah di Baca</h1>
           
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
        {{-- START TOTAL DATA ADMIN --}}
        <div class="row">
            <a href="{{ route('alertadminread') }}" style="text-decoration: none; cursor: pointer;" class="col-xl-3 col-md-6 mb-4">
                <div>
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pesan Yang Telah Dibaca</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $read->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <a href="{{ route('alertadmin') }}" style="text-decoration: none; cursor: pointer;" class="col-xl-3 col-md-6 mb-4">
            <div >
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pesan Belum Dibaca</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesan->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            
        </div>
        {{-- END TOTAL DATA ADMIN --}}




        <div class="">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h6>Pesan anda</h6>

                    
                    @foreach ($read as $data)   
                    <div class="card mb-3" style="width: 100%;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div><span style="font-size: 12px;"><b><?php echo date('d M Y') ?></b></span></div>
                                <div style="font-size: 12px;" class="text-primary">{{ $data->kode_surat }} <span class="text-capitalize">(Surat {{ $data->jenis_surat }})</span></div>
                                <div>
                                    <p>Silahkan cetak surat permohonan anda</p>  
                                    <p style="font-size: 13px; margin-top: -18px;">
                                        @if ($data->value == '1')
                                        <span class="text-warning">(Surat Diproses)</span>
                                        @elseif($data->value == '2')
                                        <span class="text-success">(Surat Disetujui)</span>
                                        @elseif($data->value == '3')
                                        <span class="text-danger">(Surat Dikonfirmasi)</span>    
                                        @endif
                                    </p>
                                </div>
                                <div class="table-data-feature" style="margin-top: -10px;">
                                        
                                    @if($data->jenis_surat == "kelahiran")
                                    <a href="{{ route('suratpengajuankelahiran') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                        <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                    </a>
                                    @elseif($data->jenis_surat == "kematian")
                                    <a href="{{ route('suratpengajuankematian') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                        <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                    </a>
                                    @elseif($data->jenis_surat == "pindah")
                                    <a href="{{ route('suratpengajuanpindah') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                        <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                    </a>
                                    @elseif($data->jenis_surat == "e-ktp")
                                    <a href="{{ route('suratpengajuanktp') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                        <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                    </a>

                                    @elseif($data->jenis_surat == "kurang mampu")
                                    <a href="{{ route('suratpengajuankurangmampu') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                        <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                    </a>

                                    @elseif($data->jenis_surat == "pengantar")
                                    <a href="{{ route('suratpengajuanpengatar') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                        <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                    </a>

                                    @elseif($data->jenis_surat == "usaha mikro")
                                    <a href="{{ route('suratpengajuanusaha') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                        <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                    </a>
                                    @endif

                                </div>
                            </li>
                        </ul>
                    </div>                
                    @endforeach 

                        
                </div>

            </div>
        </div>
    @endif
    {{-- //////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////END Admin/////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////// --}}
            


















    {{-- //////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////tampilam Pegawai////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////// --}}
    @if(auth()->user()->role=="pegawai")
    {{-- START TOTAL DATA ADMIN --}}
    <div class="row">
        <a href="{{ route('alertadminread') }}" style="text-decoration: none; cursor: pointer;" class="col-xl-3 col-md-6 mb-4">
            <div>
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pesan Yang Telah Dibaca</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $read1->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>


        <a href="{{ route('alertadmin') }}" style="text-decoration: none; cursor: pointer;" class="col-xl-3 col-md-6 mb-4">
        <div >
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pesan Belum Dibaca</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesan1->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>
        
    </div>
    {{-- END TOTAL DATA ADMIN --}}




    <div class="">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h6>Pesan anda</h6>

                
                @foreach ($read1 as $data)   
                <div class="card mb-3" style="width: 100%;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div><span style="font-size: 12px;"><b><?php echo date('d M Y') ?></b></span></div>
                            <div style="font-size: 12px;" class="text-primary">{{ $data->kode_surat }} <span class="text-capitalize">(Surat {{ $data->jenis_surat }})</span></div>
                                <div>
                                    <p>Silahkan cetak surat permohonan anda</p>  
                                    <p style="font-size: 13px; margin-top: -18px;">
                                        @if ($data->value == '1')
                                        <span class="text-warning">(Surat Diproses)</span>
                                        @elseif($data->value == '2')
                                        <span class="text-success">(Surat Disetujui)</span>
                                        @elseif($data->value == '3')
                                        <span class="text-danger">(Surat Dikonfirmasi)</span>    
                                        @endif
                                    </p>
                                </div>
                            <div class="table-data-feature" style="margin-top: -10px;">
                                    
                                @if($data->jenis_surat == "kelahiran")
                                <a href="{{ route('suratpengajuankelahiran') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                    <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                </a>
                                @elseif($data->jenis_surat == "kematian")
                                <a href="{{ route('suratpengajuankematian') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                    <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                </a>
                                @elseif($data->jenis_surat == "pindah")
                                <a href="{{ route('suratpengajuanpindah') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                    <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                </a>
                                @elseif($data->jenis_surat == "e-ktp")
                                <a href="{{ route('suratpengajuanktp') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                    <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                </a>

                                @elseif($data->jenis_surat == "kurang mampu")
                                <a href="{{ route('suratpengajuankurangmampu') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                    <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                </a>

                                @elseif($data->jenis_surat == "pengantar")
                                <a href="{{ route('suratpengajuanpengatar') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                    <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                </a>

                                @elseif($data->jenis_surat == "usaha mikro")
                                <a href="{{ route('suratpengajuanusaha') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                    <i class="fas fa-eye text-dark"></i> Cek Sakarang
                                </a>
                                @endif

                            </div>
                        </li>
                    </ul>
                </div>                
                @endforeach 

                    
            </div>

        </div>
    </div>
    @endif
    {{-- //////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////End Pegawai///////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////// --}}

</div>


    
@endsection


