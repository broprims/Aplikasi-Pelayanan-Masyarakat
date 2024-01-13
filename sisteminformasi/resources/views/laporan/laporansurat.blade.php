<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kantor Desa Pengeragoan</title>

    <!-- Custom fonts for this template-->
    <link href="/assets/pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/pages/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">


<div class="container-fluid">



        <style>
            .font-table{
                font-size: 9px;
            }

            .font-label{
                font-size: 8px;
                font-weight: 600;
            }
        </style>



        <!-- Begin Page Content -->
        <div class="mt-5">

            <!-- DataTales Example -->
            <div class=" mb-4">

                <div class="container">
                    
                    <div class="table-responsive">
                        <center>
                            <div style="margin-top: 10px; padding-top: 20px; padding-bottom: 10px;">
                                <table>
                                    <tr>
                                        <td><img src="/img/logo.png" width="90" height="90" style="margin-right: 20px;"></td>
                                        <td>
                                        <center style="line-height: 24px;">
                                            <font size="4" style="font-size: 16px;">LAPORAN DATA SURAT DESA PENGERAGOAN</font><br>
                                            <font size="4" style="font-size: 16px;">PEMERINTAH KABUPATEN JEMBRANA</font><br>
                                            <font size="5" style="font-size: 14px; font-style: italic;"><b>KECAMATAN PEKUTATAN</b></font><br>
                                            <font size="2" style="font-size: 12px; font-style: italic;"><b>KANTOR PERBEKEL DESA PENGERAGOAN</b></font><br>
                                        </center>
                                        </td>
                                    </tr>
                                </table>
                            </div>    
                        </center>
                        
                        <hr style="height: -2px;"><hr style="height: 2px; background-color: black; margin-top: -5px;">
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
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach ($penduduk as $data)
                                <tr class="font-table" >
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

<!-- Bootstrap core JavaScript-->
<script src="/assets/pages/vendor/jquery/jquery.min.js"></script>
<script src="/assets/pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/pages/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/pages/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/assets/pages/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/assets/pages/js/demo/chart-area-demo.js"></script>
<script src="/assets/pages/js/demo/chart-pie-demo.js"></script>

<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title')
        var modalBodyInput = exampleModal.querySelector('.modal-body input')

        modalTitle.textContent = 'New message to ' + recipient
        modalBodyInput.value = recipient
    })
</script>

<script>
    window.print();
</script>

</body>

</html>
