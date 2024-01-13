@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Penduduk Pendatang Desa Pengeragoan</h1>
            <form action="{{ url("/datapendatang/printsearchmys") }}" method="get">
                @csrf
                <input type="hidden" name="nik" value="{{Request::get('nik')}}">
                <input type="hidden" name="no_kk" value="{{Request::get('no_kk')}}">
                <input type="hidden" name="nama" value="{{Request::get('nama')}}">
                <input type="hidden" name="banjar" value="{{Request::get('banjar')}}">
                <input type="hidden" name="created_at" value="{{Request::get('created_at')}}">
                <input type="hidden" name="updated_at" value="{{Request::get('updated-at')}}">
                <div class="col-md-12">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="submit" target="blank">
                        <i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report
                    </button>
                </div>
            </form>
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
                                    Jumlah Pendatang</div>
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

        <!-- Content Row -->


        <!-- Begin Page Content -->
        <div class="">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">

                    <form action="{{ url("/datapendatang/search") }}" method="get">
                        @csrf
                        <div class="">
                            <button class="btn btn-white btn-outline-success" style="font-size: 12px;" type="submit">
                                Search <i class="fa fa-search"></i>
                            </button>
                        </div>
                        <div class="row mt-2 mb-2">
                            <div class="col-md-2">
                                <div class="input-group input-group-sm">
                                    <input type="number" name="nik" value="{{Request::get('nik')}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="NIK Masyarakat">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="no_kk" value="{{Request::get('no_kk')}}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="NO. Kartu Keluarga">
                                </div>
                            </div>

                            <div class="col-md-2">
                                    <div class="input-group input-group-sm">
                                        <input name="nama" value="{{Request::get('nama')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nama masyarakat">
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
                                    <th>NO. KK</th>
                                    <th>Nama</th>
                                    <th>Banjar</th>
                                    <th>Alamat</th>
                                    <th class="text-right">Tanggal Lahir</th>
                                    <th class="text-left">Ditambahkan</th>
                                    {{-- <th>Terakhir di Ubah</th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach ($pendatang as $data)
                                <tr class="font-table">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->id_register }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td>{{ $data->no_kk }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td class="text-capitalize">{{ $data->banjar }}</td>
                                    <td class="text-capitalize">{{ $data->alamat }}</td>
                                    <td class="text-right">{{ date('d M, Y', strtotime($data->tgl_lahir)) }}</td>
                                    <td class="text-left">{{ $data->created_at }}</td>
                                    {{-- <td>{{ $data->updated_at }}</</td> --}}
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


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endsection
