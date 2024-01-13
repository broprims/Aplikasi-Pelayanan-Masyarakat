@extends('layouts.pagecontroll')
@section('content')
@if(auth()->user()->role=="admin")
<div class="container-fluid">

    <style>
        .font-table{
            font-size: 10px;
        }

        .font-label{
            font-size: 12px;
            font-weight: 600;
        }

        .scroll{
            width: 100%;
            height: 20vh;
            overflow: auto;
        }
    </style>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

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
                            <i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>
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
                                Total Banjar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $banjar->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gopuram fa-2x text-gray-300"></i>
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

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
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
    </div>

    <div class="mt-3 row mx-2 mb-2 pb-2 bg-white">
        <div class="pt-2 pb-2 px-4">
            <h5>Data Surat Pengajuan Yang Belum di Selesaikan</h5>
        </div>

        <div class="table-responsive mx-4 scroll">
            {{-- START TABLE DATA PENGAJUAN SURAT MASYARAKAT --}}
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="font-table">
                        <th>NO</th>
                        <th>Kode Surat</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($datasurat as $data)
                    @if($data->value == '1')
                        @if ($data->jenis_surat == 'kelahiran')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuankelahiran') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'kematian')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuankematian') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'kurang mampu')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuankurangmampu') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'pengantar')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuanpengatar') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'e-ktp')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuanktp') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'pindah')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuanpindah') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'usaha mikro')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuanusaha') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endif
                    @endforeach   
                </tbody>
            </table>
            {{-- END TABLE DATA PENGAJUAN SURAT MASYARAKAT --}}
        </div>    
    </div>

    <!-- Content Row -->

    <div class="row mx-2 mb-3">
        <div class="col-md-12">
            <div>
                <div class="panel-heading"><b>Charts</b></div>
                <div class=" col-md-offset-1 row bg-white">
                    <div class="panel panel-default col-md-8 pt-4">
                        <div class="panel-body ">
                            <canvas id="canvas" height="280" width="600"></canvas>
                        </div>
                    </div>

                    <div class="panel panel-default col-md-4 pt-4">
                        <div class="panel-body">
                            <canvas id="canvas1" height="250" width="300"></canvas>
                            <div class="text-center mt-4 mb-4">Data Penduduk Desa</div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
            <script>
                var url = "{{url('/dashboard/chart')}}";
                var Years = new Array();
                var Labels = new Array();
                var Prices = new Array();
                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Years.push(data.tahun);
                            Labels.push(data.ket);
                            Prices.push(data.jumlah);
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:Years,
                                datasets: [{
                                    label: 'Banyak Penduduk',
                                    data: Prices,
                                    backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                    ],
                                    borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    });
                });
            </script>    


            <script>
                var url1 = "{{url('/dashboard/chart1')}}";
                var Keterangan = new Array();
                var Jumlah = new Array();
                $(document).ready(function(){
                    $.get(url1, function(response){
                        response.forEach(function(data){
                            Keterangan.push(data.label);
                            Jumlah.push(data.jumlah);
                        });
                        var ctx = document.getElementById("canvas1").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels:Keterangan,
                                datasets: [{
                                    data: Jumlah,
                                    backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                    ],
                                    hoverOffset: 4

                                }],
                                
                            },
                            
                        });
                    });
                });
            </script>
        </div>          
    </div>

</div>    
@endif



@if(auth()->user()->role=="pegawai")
<div class="container-fluid">
    <style>
        .font-table{
            font-size: 10px;
        }

        .font-label{
            font-size: 12px;
            font-weight: 600;
        }

        .scroll{
            width: 100%;
            height: 20vh;
            overflow: auto;
        }
    </style>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

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
                            <i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>
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
                                Total Banjar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $banjar->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gopuram fa-2x text-gray-300"></i>
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

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
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
    </div>


    <div class="mt-3 row mx-2 mb-2 pb-2 bg-white">
        <div class="pt-2 pb-2 px-4">
            <h5>Data Surat Pengajuan Yang Belum di Selesaikan</h5>
        </div>

        <div class="table-responsive mx-4 scroll">
            {{-- START TABLE DATA PENGAJUAN SURAT MASYARAKAT --}}
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="font-table">
                        <th>NO</th>
                        <th>Kode Surat</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jenis Surat</th>
                        <th>Status</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($datasurat as $data)
                    @if($data->value == '1')
                        @if ($data->jenis_surat == 'kelahiran')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuankelahiran') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'kematian')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuankematian') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'kurang mampu')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuankurangmampu') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'pengantar')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuanpengatar') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'e-ktp')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuanktp') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'pindah')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuanpindah') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @elseif($data->jenis_surat == 'usaha mikro')
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
                                    
                                    
                                    <a href="{{ route('suratpengajuanusaha') }}" class="item bg-warning p-1 text-dark mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                        Cek Sakarang
                                    </a>

                                    
                                </div>
                            </td>
                        </tr>
                        @endif
                    @endif
                    @endforeach   
                </tbody>
            </table>
            {{-- END TABLE DATA PENGAJUAN SURAT MASYARAKAT --}}
        </div>    
    </div>

    <!-- Content Row -->

    <div class="row mx-2">
        <div class="col-md-12">
            <div>
                <div class="panel-heading"><b>Charts</b></div>
                <div class=" col-md-offset-1 row">
                    <div class="panel panel-default col-md-8 bg-white">
                        <div class="panel-body ">
                            <canvas id="canvas" height="280" width="600"></canvas>
                        </div>
                    </div>

                    <div class="panel panel-default col-md-4 bg-white">
                        <div class="panel-body">
                            <canvas id="canvas1" height="250" width="300"></canvas>
                            <div class="text-center mt-4 mb-4">Data Penduduk Desa</div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
            <script>
                var url = "{{url('/dashboard/chart')}}";
                var Years = new Array();
                var Labels = new Array();
                var Prices = new Array();
                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Years.push(data.tahun);
                            Labels.push(data.ket);
                            Prices.push(data.jumlah);
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:Years,
                                datasets: [{
                                    label: 'Banyak Penduduk',
                                    data: Prices,
                                    backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(201, 203, 207, 0.2)'
                                    ],
                                    borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(201, 203, 207)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    });
                });
            </script>    


            <script>
                var url1 = "{{url('/dashboard/chart1')}}";
                var Keterangan = new Array();
                var Jumlah = new Array();
                $(document).ready(function(){
                    $.get(url1, function(response){
                        response.forEach(function(data){
                            Keterangan.push(data.label);
                            Jumlah.push(data.jumlah);
                        });
                        var ctx = document.getElementById("canvas1").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels:Keterangan,
                                datasets: [{
                                    data: Jumlah,
                                    backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 205, 86)'
                                    ],
                                    hoverOffset: 4

                                }],
                                
                            },
                            
                        });
                    });
                });
            </script>
        </div>          
    </div>

    

</div>    
@endif

@if(auth()->user()->role=="masyarakat")
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div>
    

        <img class="img-profile rounded-circle mx-4" src="/assets/pages/img/undraw_profile.svg" style="width: 300px;">
        <div class="mx-5 mt-5">
            <h1 class="text-capitalize">Selamat Datang {{ auth()->user()->role }}</h1> 
            <h5 class="">{{ auth()->user()->nama }}</h5>
            <h6>NIK : {{ auth()->user()->nik }}</h6>    
            @foreach ($identitas as $item)
            <h6>NO. KK : {{ $item->no_kk }}</h6>
            @endforeach   
        </div> 
                            
    </div>  

</div>

{{-- <script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 500);
    })
</script> --}}
@endif
@endsection

