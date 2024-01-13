@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pendidikan Penduduk</h1>
            <form action="{{ url("/datapendidikan/printsearchmys") }}" method="get">
                @csrf
                <input type="hidden" name="id_register" value="{{Request::get('id_register')}}">
                <input type="hidden" name="nama"value="{{Request::get('nama')}}">
                <input type="hidden" name="nik" value="{{Request::get('nik')}}">
                <input type="hidden" name="pendidikan" value="{{Request::get('pendidikan')}}">
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
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    SD</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sd->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-school fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    SMP</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $smp->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-school fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    SMA</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sma->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-school fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    S1</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $s1->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    S2</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $s2->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    S3</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $s3->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
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

                    <form action="{{ url("/datapendidikan/search") }}" method="get">
                        @csrf
                        
                        <div class="row mt-2 mb-2">

                            <div class="col-md-2">
                                <div class="input-group input-group-sm">
                                    <input type="number" name="nik" value="{{Request::get('nik')}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="NIK Masyarakat">
                                </div>
                            </div>

                            <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input name="nama" value="{{Request::get('nama')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nama masyarakat">
                                    </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="input-group input-group-sm">
                                    {{-- <input type="text"  name="jenis_surat" value="{{Request::get('jenis_surat')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Banjar Pengajuan"> --}}
                                    <select type="text" class="form-control" placeholder="Pendidikan" aria-label="search" aria-describedby="search" name="pendidikan" value="{{Request::get('pendidikan')}}">
                                        <option selected class="dropdown-menu" value="">Pendidikan</option>
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
                                <th>ID Register</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Pendidikan</th>
                                <th class="text-right">Ditambahkan</th>
                                <th>Terakhir di Ubah</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($penduduk as $data)               
                            <tr class="font-table">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->id_register }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
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
                                </td>
                                <td class="text-right">{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                <td>{{ date('d M, Y', strtotime($data->updated_at)) }}</td>
                            </tr>

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
