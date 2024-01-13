@extends('layouts.pagecontroll')

@section('content')

<div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pesan Masuk</h1>
           
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
    ////////////////////////////////tampilam Masyarakat///////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////// --}}
    @if(auth()->user()->role=="masyarakat")
        {{-- START TOTAL DATA ADMIN --}}
        <div class="row">
            <a href="{{ route('alert') }}" style="text-decoration: none; cursor: pointer;" class="col-xl-3 col-md-6 mb-4">
            <div >
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pesan Belum Dibaca</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesan2->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
            

            <a href="{{ route('alertread') }}" style="text-decoration: none; cursor: pointer;" class="col-xl-3 col-md-6 mb-4">
            <div>
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pesan Yang Telah Dibaca</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $read2->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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

                    
                    @foreach ($read2 as $data)   
                    <div class="card mb-3" style="width: 100%;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div><span style="font-size: 12px;"><b><?php echo date('d M Y') ?></b></span></div>
                                <div style="font-size: 12px;" class="text-primary">{{ $data->kode_surat }} <span class="text-capitalize">(Surat {{ $data->jenis_surat }})</span></div>
                                <div>
                                    <p>Silahkan cetak surat permohonan anda</p>  
                                    <p style="font-size: 13px; margin-top: -18px;" class="mb-3">
                                        @if ($data->jenis == '2')
                                        <span class="text-success">(Surat Disetujui)</span>
                                        @else
                                        <span class="text-danger">(Surat Dikonfirmasi)</span>    
                                        @endif
                                    </p>
                                </div>
                                <div class="table-data-feature" style="margin-top: -10px;">
                                        
                                    @if($data->jenis_surat == "kelahiran")

                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                            <i class="fas fa-eye text-dark"></i> Cetak Surat
                                        </a>

                                        @elseif($data->jenis_surat == "kematian")
                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                            <i class="fas fa-eye text-dark"></i> Cetak Surat
                                        </a>

                                        @elseif($data->jenis_surat == "pindah")
                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                            <i class="fas fa-eye text-dark"></i> Cetak Surat
                                        </a>

                                        @elseif($data->jenis_surat == "e-ktp")
                                        <a href="/print-ktp/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                            <i class="fas fa-eye text-dark"></i> Cetak Surat
                                        </a>

                                        @elseif($data->jenis_surat == "kurang mampu")
                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                            <i class="fas fa-eye text-dark"></i> Cetak Surat
                                        </a>

                                        @elseif($data->jenis_surat == "pengantar")
                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                            <i class="fas fa-eye text-dark"></i> Cetak Surat
                                        </a>

                                        @elseif($data->jenis_surat == "usaha mikro")
                                        <a href="/print-permohonan/{{$data->id_surat}}" target="blank" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none; font-size: 10px;">
                                            <i class="fas fa-eye text-dark"></i> Cetak Surat
                                        </a>
                                    @endif 

                                </div>
                            </li>
                        </ul>
                    </div>                
                    @endforeach 

                    {{-- <div class="card mb-3 container" style="width: 9%; position: absolute; margin-top: -120px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div><span style="font-size: 12px;"><b><?php echo date('d M Y') ?></b></span></div>
                                <div>
                                    <p>Tidak ada pesan yang belum dibaca</p>  
                                </div>
                            </li>
                        </ul>
                    </div>  --}}

                        
                
                </div>

            </div>
        </div>
    @endif
    {{-- //////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////End Masyarakat////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////// --}}

</div>


    
@endsection


