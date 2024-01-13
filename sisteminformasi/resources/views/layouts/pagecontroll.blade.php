
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

<!-- Page Wrapper -->
<div id="wrapper">
@if(auth()->user()->role=="masyarakat")
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="/img/logodesa.png" alt="" width="40" height="40">
            </div>
            <div class="sidebar-brand-text mx-2">Kantor Desa</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="far fa-file-alt"></i>
                <span>Pengajuan Surat</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Surat Pengajuan:</h6>
                    <a class="collapse-item" href="{{ route('suratpengajuankelahiran') }}">Keterangan Kelahiran</a>
                    <a class="collapse-item" href="{{ route('suratpengajuankematian') }}">Keterangan Kematian</a>
                    <a class="collapse-item" href="{{ route('suratpengajuankurangmampu') }}">Kurang Mampu</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanpengatar') }}">Keterangan Pengantar</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanktp') }}">Permohonan E-KTP</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanpindah') }}">Keterangan Pindah</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanusaha') }}">Keterangan Usaha</a>
                </div>
            </div>
        </li>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <div>
                    Tanggal: <?php echo date('d M Y') ?>
                </div>
                {{-- <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <?php  $notif=Illuminate\Support\Facades\DB::table('surat_permohonan')->where('jenis', '2')->where('id_register', auth()->user()->id_register)->where('alert', '1')->orderby('kode_surat', 'DESC')->get();?>
                            <span class="badge badge-danger badge-counter">{{ $notif->count() }}</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Info
                            </h6>

                            <?php  $notif=Illuminate\Support\Facades\DB::table('surat_permohonan')->limit(4)->where('jenis', '2')->where('id_register', auth()->user()->id_register)->where('alert', '1')->orderby('kode_surat', 'DESC')->get();?>
                            @foreach ($notif as $data)
                            @if($data->alert == '1')
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('alert') }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500"><?php echo date('d M Y') ?></div>
                                    <div class="small text-gray-500 text-capitalize">Surat {{ $data->jenis_surat }} <span class="text-success">( Surat anda telah disetujui )</span></div>
                                    <span class="font-weight-bold">{{ $data->kode_surat }}</span>
                                    <form action="/dashboard/alertdashboard1/{{ $data->id_surat }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="0" name="alert">
                                        <button type="submit" class="btn btn-primary mt-1" style="font-size: 9px;">Telah di baca</button>
                                    </form>
                                </div>
                            </a>       
                            @endif
                            @endforeach
                            <a class="dropdown-item text-center small text-gray-500" href="{{ route('alert') }}">Show All Alerts</a>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span> 
                            <img class="img-profile rounded-circle"
                                 src="/assets/pages/img/undraw_profile.svg">
                            
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            {{-- <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div> --}}
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('content')
            @yield('scripts')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
@endif

@if(auth()->user()->role=="pegawai")
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="/img/logodesa.png" alt="" width="40" height="40">
            </div>
            <div class="sidebar-brand-text mx-2">Kantor Desa</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('tableuser') }}">
                <i class="fas fa-users-cog"></i>
                <span>Management User</span>
            </a>
        </li>

        <!-- Divider
        <hr class="sidebar-divider">

        Heading
        <div class="sidebar-heading">
            Addons
        </div> -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('datapenduduk') }}">
                <i class="fas fa-users-cog"></i>
                <span>Data Penduduk</span>
            </a>
        </li>

       
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="far fa-file-alt"></i>
                <span>Pengajuan Surat</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Surat Pengajuan:</h6>
                    <a class="collapse-item" href="{{ route('suratpengajuankelahiran') }}">Keterangan Kelahiran</a>
                    <a class="collapse-item" href="{{ route('suratpengajuankematian') }}">Keterangan Kematian</a>
                    <a class="collapse-item" href="{{ route('suratpengajuankurangmampu') }}">Kurang Mampu</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanpengatar') }}">Keterangan Pengantar</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanktp') }}">Permohonan E-KTP</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanpindah') }}">Keterangan Pindah</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanusaha') }}">Keterangan Usaha</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-file"></i>
                <span>Laporan Kependudukan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Laporan Statistik:</h6>
                    <a class="collapse-item" href="{{ route('datakependuduk') }}">Jumlah Penduduk</a>
                    <a class="collapse-item" href="{{ route('datagender') }}">Jenis Kelamin</a>
                    <a class="collapse-item" href="{{ route('dataagama') }}">Agama</a>
                    <a class="collapse-item" href="{{ route('datakelahiran') }}">Kelahiran</a>
                    <a class="collapse-item" href="{{ route('datakematian') }}">Kematian</a>
                    <a class="collapse-item" href="{{ route('datapendatang') }}">Pendatang</a>
                    <a class="collapse-item" href="{{ route('datapendidikan') }}">Pendidikan</a>
                    <h6 class="collapse-header">Laporan:</h6>
                    <a class="collapse-item" href="{{ route('rekapsurat') }}">Rekap Surat</a>
                </div>
            </div>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('masterbanjar') }}">
                <i class="fas fa-database"></i>
                <span>Master Data</span>
            </a>
        </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <div>
                    Tanggal: <?php echo date('d M Y') ?>
                </div>
                {{-- <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <?php  $notif=Illuminate\Support\Facades\DB::table('pengajuan_surat')->where('alert1', '1')->orderby('kode_surat', 'DESC')->get();?>
                            <span class="badge badge-danger badge-counter">{{ $notif->count() }}</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Info
                            </h6>

                            

                            <?php  $notif=Illuminate\Support\Facades\DB::table('pengajuan_surat')->limit(4)->where('alert1', '1')->orderby('kode_surat', 'DESC')->get();?>
                            @foreach ($notif as $data)
                            @if($data->alert1 == '1')
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('alertadmin') }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500"><?php echo date('d M Y') ?></div>
                                    <div class="small text-gray-500 text-capitalize">Surat {{ $data->jenis_surat }} <span class="text-primary">({{ $data->nama }})</span></div>
                                    <span class="font-weight-bold">{{ $data->kode_surat }}</span>
                                    <form action="/dashboard/alertdashboard2/{{ $data->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="0" name="alert1">
                                        <button type="submit" class="btn btn-primary mt-1" style="font-size: 9px;">Telah di baca</button>
                                    </form>
                                </div>
                            </a>       
                            @endif
                            @endforeach
                            <a class="dropdown-item text-center small text-gray-500" href="{{ route('alertadmin') }}">Show All Alerts</a>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span> 
                            <img class="img-profile rounded-circle"
                                 src="/assets/pages/img/undraw_profile.svg">
                            
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            {{-- <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div> --}}
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('content')
            @yield('scripts')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
@endif




@if(auth()->user()->role=="admin")
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="/img/logodesa.png" alt="" width="40" height="40">
            </div>
            <div class="sidebar-brand-text mx-2">Kantor Desa</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider
        <hr class="sidebar-divider">

        Heading
        <div class="sidebar-heading">
            Interface
        </div> -->

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('tableuser') }}">
                <i class="fas fa-users-cog"></i>
                <span>Management User</span>
            </a>
        </li>

        <!-- Divider
        <hr class="sidebar-divider">

        Heading
        <div class="sidebar-heading">
            Addons
        </div> -->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('datapenduduk') }}">
                <i class="fas fa-users-cog"></i>
                <span>Data Penduduk</span>
            </a>
        </li>

       
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="far fa-file-alt"></i>
                <span>Pengajuan Surat</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Surat Pengajuan:</h6>
                    <a class="collapse-item" href="{{ route('suratpengajuankelahiran') }}">Keterangan Kelahiran</a>
                    <a class="collapse-item" href="{{ route('suratpengajuankematian') }}">Keterangan Kematian</a>
                    <a class="collapse-item" href="{{ route('suratpengajuankurangmampu') }}">Kurang Mampu</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanpengatar') }}">Keterangan Pengantar</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanktp') }}">Permohonan E-KTP</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanpindah') }}">Keterangan Pindah</a>
                    <a class="collapse-item" href="{{ route('suratpengajuanusaha') }}">Keterangan Usaha</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-file"></i>
                <span>Laporan Kependudukan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Laporan Statistik:</h6>
                    <a class="collapse-item" href="{{ route('datakependuduk') }}">Jumlah Penduduk</a>
                    <a class="collapse-item" href="{{ route('datagender') }}">Jenis Kelamin</a>
                    <a class="collapse-item" href="{{ route('dataagama') }}">Agama</a>
                    <a class="collapse-item" href="{{ route('datakelahiran') }}">Kelahiran</a>
                    <a class="collapse-item" href="{{ route('datakematian') }}">Kematian</a>
                    <a class="collapse-item" href="{{ route('datapendatang') }}">Pendatang</a>
                    <a class="collapse-item" href="{{ route('datapendidikan') }}">Pendidikan</a>
                    <h6 class="collapse-header">Laporan:</h6>
                    <a class="collapse-item" href="{{ route('rekapsurat') }}">Rekap Surat</a>
                </div>
            </div>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('masterbanjar') }}">
                <i class="fas fa-database"></i>
                <span>Master Data</span>
            </a>
        </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <div>
                    Tanggal: <?php echo date('d M Y') ?>
                </div>
                {{-- <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <?php  $notif=Illuminate\Support\Facades\DB::table('pengajuan_surat')->where('alert', '1')->orderby('kode_surat', 'DESC')->get();?>
                            <span class="badge badge-danger badge-counter">{{ $notif->count() }}</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Info
                            </h6>

                            

                            <?php  $notif=Illuminate\Support\Facades\DB::table('pengajuan_surat')->limit(4)->where('alert', '1')->orderby('kode_surat', 'DESC')->get();?>
                            @foreach ($notif as $data)
                            @if($data->alert == '1')
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('alertadmin') }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500"><?php echo date('d M Y') ?></div>
                                    <div class="small text-gray-500 text-capitalize">Surat {{ $data->jenis_surat }} <span class="text-primary">({{ $data->nama }})</span></div>
                                    <span class="font-weight-bold">{{ $data->kode_surat }}</span>
                                    <form action="/dashboard/alertdashboard/{{ $data->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="0" name="alert">
                                        <button type="submit" class="btn btn-primary mt-1" style="font-size: 9px;">Telah di baca</button>
                                    </form>
                                </div>
                            </a>       
                            @endif
                            @endforeach
                            <a class="dropdown-item text-center small text-gray-500" href="{{ route('alertadmin') }}">Show All Alerts</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span> 
                            <img class="img-profile rounded-circle"
                                 src="/assets/pages/img/undraw_profile.svg">
                            
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            {{-- <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div> --}}
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('content')
            @yield('scripts')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->
@endif
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar??</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk keluar dari website ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-primary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
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

</body>

</html>
