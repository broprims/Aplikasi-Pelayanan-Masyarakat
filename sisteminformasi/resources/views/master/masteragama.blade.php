@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Master Data</h1>
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
                                    Jumlah Banjar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masterbanjar->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-gopuram fa-2x text-gray-300"></i>
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
                                    Jumlah Agama</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masteragama->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
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
                        <div class="d-flex">
                            <div class="d-flex mb-2">
                                <a href="/masterbanjar" class="mr-2 btn btn-primary" style="font-size: 12px;">Master Banjar</a>
                            </div>

                            <div class="d-flex mb-2">
                                <a href="/masteragama" class="mr-2 btn btn-warning" style="font-size: 12px;">Master Agama</a>
                            </div>
                        </div>

                        <div>
                            <a type="button" data-toggle="modal" data-target="#tambahmasyarakat" class="btn btn-secondary" style="font-size: 12px;">Tambah Data Banjar<i class="far fa-file-alt"></i></a>
                        </div>

                        <!--Start Modal Tambah-->
                        <div class="modal fade" id="tambahmasyarakat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Agama</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                </div>
                                <form action="/masteragama/store1" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">   
                                    <div class="mb-3 col-md-12">
                                        <input type="reset" value="Reset" class="btn btn-warning text-dark float-right">
                                    </div> 
                                    
                                    <div class="mb-1">
                                        <input type="hidden" class="form-control" name="id" value="{{ $idbaru }}">
                                    </div>
                                    
                                    <div class="mb-1 ">
                                        <input type="hidden" class="form-control" name="kode_agama" value="{{ $kode }}">
                                    </div>

                                    <div class="mb-1">
                                        <label for="agama" class="col-form-label font-label">Agama:</label>
                                        <input type="text" class="form-control" name="agama">
                                    </div>
                                    

                                    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d'); ?>">
                                    <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d'); ?>">


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
                        <strong>Data Agama</strong> {{ session()->get('success') }}.
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
                        <strong>Data Agama</strong> {{ session()->get('error') }}.
                    </div>
                    @endif  

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr class="font-table">
                                <th>NO</th>
                                <th>ID</th>
                                <th>Agama</th>
                                <th class="text-right">Tanggal Dibuat</th>
                                <th class="text-left">Terakhir Diubah</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($masteragama as $data)
                            <tr class="font-table">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kode_agama }}</td>
                                <td>{{ $data->agama }}</td>
                                <td class="text-right">{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                <td class="text-left">{{ date('d M, Y', strtotime($data->updated_at)) }}</td>
                                
                                <td class="text-left">
                                    <div class="table-data-feature">
                                        <a class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer;">
                                            <i type="button" data-toggle="modal" data-target="#editagama{{$data->id}}" class="fas fa-pen text-center ml-1"></i>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>

                            <!--Start Modal Tambah-->
                            <div class="modal fade" id="editagama{{$data->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Agama</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/masteragama/update1/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">   
                                        <div class="mb-3 col-md-12">
                                            <input type="reset" value="Reset" class="btn btn-warning text-dark float-right">
                                        </div>
                                    

                                        <div class="mb-1">
                                            <label for="agama" class="col-form-label font-label">Agama:</label>
                                            <input type="text" class="form-control" name="agama" value="{{ $data->agama }}">
                                        </div>

                                        <input type="hidden" name="created_at" value="{{ $data->created_at }}">
                                        <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d'); ?>">
              
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

