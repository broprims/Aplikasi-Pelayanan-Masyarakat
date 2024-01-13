@extends('layouts.pagecontroll')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Keluarga</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                                    Jumlah (Penduduk)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $keluarga->count() }}</div>
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
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Earnings (Annual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                 style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
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

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
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
                            <a href="{{ route('datakeluarga') }}" class="mr-2 btn btn-primary" style="font-size: 12px;">Data Keluarga</a>
                        </div>

                        <div>
                            <a type="button" data-toggle="modal" data-target="#tambahmasyarakat" class="btn btn-secondary" style="font-size: 12px;">Tambah Data Keluarga <i class="fas fa-baby"></i></a>
                        </div>

                        <!--Start Modal Tambah-->
                        <div class="modal fade" id="tambahmasyarakat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Keluarga</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                </div>
                                <form action="/datakeluarga/store4" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">                            
                                    <div class="mb-1 d-none">
                                        <input type="number" class="form-control" name="id" value="{{ $idbaru }}">
                                    </div>

                                    <div class="mb-1 d-none">
                                        <label for="kode" class="col-form-label font-label">Kode:</label>
                                        <input type="text" class="form-control" id="kode" name="kode" value="{{ $kode }}">
                                    </div>
                                    
                                    <div class="mb-1 d-none">
                                        <label for="id_register" class="col-form-label font-label">id:</label>
                                        <input type="text" class="form-control" id="id_register" name="id_register" readonly>
                                    </div>

                                    <div class="mb-1">
                                        <label for="NIK" class="col-form-label font-label">NIK:</label>
                                        <input type="text" class="form-control" id="nik" name="nik" required>
                                    </div>

                                    <div class="mb-1">
                                        <label for="no_kk" class="col-form-label font-label">No KK:</label>
                                        <input type="number" class="form-control" id="no_kk" name="no_kk">
                                    </div>
                                    
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label for="nama" class="col-form-label font-label">Nama:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                        </div>

                                        <div class="mb-1 col-md-4">
                                            <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                        </div>

                                        <div class="mb-1 col-md-2">
                                            <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                            <input type="text" class="form-control" id="gender" name="gender">
                                            {{-- <select name="gender" class="form-control">
                                                <option value="">--Pilih Jenis Kelamin--</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                        
                                        <div class="mb-1 col-md-4">
                                            <label for="banjar" class="col-form-label font-label">Banjar:</label>
                                            <input type="text" class="form-control" id="banjar" name="banjar">
                                        </div>

                                        <div class="mb-1 col-md-6">
                                            <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat">
                                        </div>

                                        <div class="mb-1 col-md-2">
                                            <label for="value" class="col-form-label font-label">Status:</label>
                                            <select name="value" class="form-control" required>
                                                <option value="">--Pilih Status--</option>
                                                <option value="1">Aktif</option>
                                                <option value="0">Nonaktif</option>
                                            </select> 
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

                                        <input type="hidden" name="status" value="keluarga" id="">
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

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr class="font-table">
                                <th>NO</th>
                                <th>Kode</th>
                                <th>NIK</th>
                                <th>NO. KK</th>
                                <th>Nama</th>
                                <th>Tgl. Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th class="text-right">Ditambahkan</th>
                                <th>Terakhir di Ubah</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($keluarga as $data)
                            @if($data->status =="keluarga")
                            <tr class="font-table">
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kode }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->no_kk }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ date('d M, Y', strtotime($data->tgl_lahir)) }}</td>
                                <td>{{ $data->gender }}</td>
                                <td class="text-right">{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</</td>
                                <td class="text-right">
                                    <div class="table-data-feature">
                                        <a class="item bg-primary p-1 text-white mr-2" style="border-radius: 10%; cursor: pointer;">
                                            <i type="button" data-toggle="modal" data-target="#update{{$data->id_register}}" class="fas fa-pen text-center ml-1"></i>
                                        </a> 
                                        
                                        <a type="button" data-toggle="modal" data-target="#view{{$data->id_register}}" class="item bg-warning pt-1 pb-1 px-1 pl-2 pr-2 text-white mr-2" style="border-radius: 10%; cursor: pointer;">
                                            <i class="fas fa-eye text-center"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!--Start Modal Edit-->
                            <div class="modal fade" id="update{{$data->id_register}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Keluarga</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                                    <form action="/datakeluarga/update4/{{$data->id_register}}" method="POST" enctype="multipart/form-data">
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
                                                    <option value="{{ $data->value }}">@if ($data->value == '1')
                                                        Aktif
                                                        @else
                                                        Nonaktif
                                                        @endif
                                                    </option>
                                                    <option value="">--Pilih Status--</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Nonaktif</option>
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

                                            <input type="hidden" name="status" value="keluarga" id="">
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

                            <!--Start Modal View-->
                            <div class="modal fade" id="view{{$data->id_register}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">View Data Keluarga</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                    </div>
                        
                                    <div class="modal-body mx-4">                            

                                        <div class="">
                                            <h3 style="font-size: 3em; font-weight: 500;">{{ $data->nama }}</h3>
                                        </div>

                                        <div class="d-flex">
                                            <div class="px-1">
                                                <span for="nik" class="font-label" style="font-size: 17px;">No. KK:</span>
                                                <span class="px-1 pt-1" style="font-size: 15px; font-weight: 500;">{{ $data->no_kk }}</span>
                                            </div>
    
                                            <div class="px-1">
                                                <span for="nik" class="font-label" style="font-size: 17px;">NIK:</span>
                                                <span class="px-1 pt-1" style="font-size: 15px; font-weight: 500;">{{ $data->nik }}</span>
                                            </div>
                                        </div>

                                        <div class="px-1 mt-5" style="line-height: 1px;">
                                            <span for="nik" class="font-label" style="font-size: 17px;">Detail:</span>
                                            <hr>
                                        </div>
                                    
                                        
                                        <div class="row">
                                            <div class="mb-1 col-md-3">
                                                <label for="tgl_lahir" class="col-form-label font-label">Tgl. Lahir:</label>
                                                <h5>{{ date('d M, Y', strtotime($data->tgl_lahir)) }}<h5>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                                <h5>{{ $data->gender }}</h5>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="gender" class="col-form-label font-label">Jenis Kelamin:</label>
                                                <h5>
                                                    @if ($data->value == '1')
                                                        Aktif
                                                        @else
                                                        Nonaktif
                                                    @endif
                                                </h5>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="gender" class="col-form-label font-label">Desa:</label>
                                                <h5>{{ $data->desa }}</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-3">
                                                <label for="banjar" class="col-form-label font-label">Banjar:</label>
                                                <h5>{{$data->banjar}}</h5>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="kec" class="col-form-label font-label">Kecamatan:</label>
                                                <h5>{{$data->kec}}</h5>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="kab" class="col-form-label font-label">Kabupaten:</label>
                                                <h5>{{$data->kab}}</h5>
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <label for="kab" class="col-form-label font-label">Provinsi:</label>
                                                <h5>{{$data->provinsi}}</h5>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-1 col-md-3">
                                                <label for="negara" class="col-form-label font-label">Kewarganegaraan:</label>
                                                <h5>{{$data->negara}}</h5>
                                            </div>

                                            <div class="mb-1 col-md-9">
                                                <label for="alamat" class="col-form-label font-label">Alamat:</label>
                                                <h5>{{ $data->alamat }}</h5>
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
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!--End Modal Edit-->


                            @endif
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