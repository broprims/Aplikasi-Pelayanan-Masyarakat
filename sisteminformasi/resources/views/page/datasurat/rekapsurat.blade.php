@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Surat Penduduk</h1>
            <form action="{{ url("/rekapsurat/printsearchmys") }}" method="get">
                @csrf
                <input type="hidden" name="kode_surat" value="{{Request::get('kode_surat')}}">
                <input type="hidden" name="nama"value="{{Request::get('nama')}}">
                <input type="hidden" name="banjar" value="{{Request::get('banjar')}}">
                <input type="hidden" name="created_at" value="{{Request::get('created_at')}}">
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
                                    Jumlah Surat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                                    Jumlah Surat Permohonan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $surat2->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Surat Pengajuan
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pengajuan->count() }}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <!-- Begin Page Content -->
        <div class="">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-body">

                    <form action="{{ url("/surat/search") }}" method="get" >

                        <div class="row mb-4">

                            <div class="col-lg-2">
                                <div class="input-group input-group-sm">
                                    <input name="kode_surat" value="{{Request::get('kode_surat')}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Kode Surat">
                                </div>
                            </div>

                            <div class="col-md-2">
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
                                    {{-- <input type="text"  name="jenis_surat" value="{{Request::get('jenis_surat')}}"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Banjar Pengajuan"> --}}
                                    <select type="text" class="form-control" placeholder="Kategori" aria-label="search" aria-describedby="search" value="{{Request::get('jenis')}}" name="jenis">
                                        <option selected class="dropdown-menu" value="">Kategori</option>
                                        <option value="" class="dropdown-item">Semua</option>
                                        <option value="1" class="dropdown-item">Pengajuan</option>
                                        <option value="2" class="dropdown-item">Permohonan</option>
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
                                <th>Jenis Surat</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Tanggal Dibuat</th>
                                <th>Kategori Surat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($surat as $data)
                            <tr class="font-table">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kode_surat }}</td>
                                <td class="text-capitalize">{{ $data->jenis_surat }}</td>
                                <td>{{ $data->nama }}</td>
                                @if($data->keterangan == "")
                                <td>Tidak ada keterangan</td>
                                @else
                                <td>{{ $data->keterangan }}</td>
                                @endif
                                <td>{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                @if ($data->jenis == "1")
                                <td>Pengajuan Surat</td>
                                @elseif ($data->jenis == "2")
                                <td>Surat Permohonan</td>
                                @endif


                                <td class="text-left">
                                    <div class="table-data-feature">

                                        <a href="/print-permohonan/{{$data->id}}" target="blank" class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer; text-decoration: none;">
                                            Detail <i class="fas fa-eye text-center text-dark"></i>
                                        </a>

                                    </div>
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


    </div>



@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection
