<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\page\Admin\AdminController;
use App\Http\Controllers\page\Admin\AdminUserController;
use App\Http\Controllers\page\Admin\AdminKependudukanController;
use App\Http\Controllers\page\Admin\SuratController;
use App\Http\Controllers\page\Admin\MasterDataController;
use App\Http\Controllers\page\Admin\kependudukanController;
use App\Http\Controllers\page\Admin\AlertController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    if (Auth::user()) {
        return redirect('/dashboard');
    }

    return view('auth.authpage');
})->name('authpage');

//login controller
Route::get('/authpage', [LoginController::class, 'index'])->name('login');
Route::post('/authpage', [LoginController::class, 'store']);
//login controller

//register controller
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//register controller

//logout controller
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
//logout controller


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////   Admin PAGE   ////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/dashboard/chart',[AdminController::class, 'chart']);
Route::get('/dashboard/chart1',[AdminController::class, 'chart1']);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////   Table Users   ////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/tableuser', [AdminUserController::class, 'index'])->name('tableuser');
Route::get('/tablemasyarakat', [AdminUserController::class, 'masyarakat'])->name('tablemasyarakat');
Route::get('/tablepegawai', [AdminUserController::class, 'pegawai'])->name('tablepegawai');
Route::get('/tableadmin', [AdminUserController::class, 'admin'])->name('tableadmin');


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////   Table Users   ////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/datapenduduk', [AdminKependudukanController::class, 'index'])->name('datapenduduk');

// tambah penduduk
// Route::get('/datapenduduk/add', [MemberBarangController::class, 'add']);
Route::post('/datapenduduk/store', [AdminKependudukanController::class, 'store'])->name('storependuduk');
Route::post('/datapenduduk/update/{id_register}', [AdminKependudukanController::class, 'update'])->name('updatependuduk');
// end

//CRUD Users Management
// tambah user login
Route::post('/tablemasyarakat/store', [AdminUserController::class, 'store'])->name('storeuser');
Route::post('/tableadmin/store', [AdminUserController::class, 'store'])->name('storeuser');
Route::post('/tablepegawai/store', [AdminUserController::class, 'store'])->name('storeuser');
//end tambah

//edit user login
Route::post('/tablemasyarakat/update/{kode_user}', [AdminUserController::class, 'update'])->name('updateuser');
Route::post('/tableuser/updatepassword/{kode_user}', [AdminUserController::class, 'updatepassword']);
//end edit


//hapus user login
Route::post('/tableuser/destroy/{kode_user}', [AdminUserController::class, 'destroy'])->name('hapususer');
Route::post('/tablemasyarakat/destroy1/{kode_user}', [AdminUserController::class, 'destroy1'])->name('hapusmasyarakat');
Route::post('/tablepegawai/destroy2/{kode_user}', [AdminUserController::class, 'destroy2'])->name('hapuspetugas');
Route::post('/tableadmin/destroy3/{kode_user}', [AdminUserController::class, 'destroy3'])->name('hapusadmin');
//hapus 

//end

Route::get('/getUser/{nik}', function ($nik) {
    $users = DB::table('register')->where('nik', $nik)->get();
    return response()->json($users);
})->name('getUser');

Route::get('/getkk/{no_kk}', function ($no_kk) {
    $register = DB::table('register')->where('no_kk', $no_kk)->get();
    return response()->json($register);
})->name('getkk');


//////////////////////////////////Surat Kelahiran/////////////////////////////////////////
// Surat Pengajuan kelahiran
Route::get('/suratpengajuankelahiran', [SuratController::class, 'suratpengajuankelahiran'])->name('suratpengajuankelahiran');
Route::get('/surat-pengajuan-kelahiran/{id}', [SuratController::class, 'pengajuankelahiran'])->name('pengajuankelahiran');
//end

// CRUD data kelahiran
Route::post('/suratpengajuankelahiran/store', [SuratController::class, 'store'])->name('storekelahiran');
Route::post('/suratpengajuankelahiran/konfirmasi/{id}', [SuratController::class, 'update']);
Route::post('/suratpengajuankelahiran/setuju/{id}', [SuratController::class, 'setuju']);
// Route::post('/suratpengajuankelahiran/update/{id_register}', [SuratController::class, 'update'])->name('updatekelahiran');
// end


//Surat Permohonan
Route::get('/suratpermohonankelahiran', [SuratController::class, 'suratpermohonankelahiran'])->name('permohonankelahiran');
Route::get('/surat-permohonan-kelahiran/{id_surat}', [SuratController::class, 'permohonankelahiran'])->name('suratkelahiran');
//end
//////////////////////////////////Surat Kelahiran/////////////////////////////////////////


//////////////////////////////////Surat Kematian/////////////////////////////////////////
// Surat Pengajuan kematian
Route::get('/suratpengajuankematian', [SuratController::class, 'suratpengajuankematian'])->name('suratpengajuankematian');
Route::get('/surat-pengajuan-kematian/{id}', [SuratController::class, 'pengajuankelahiran'])->name('pengajuankelahiran');
//end

// CRUD data kematian
Route::post('/suratpengajuankematian/store3', [SuratController::class, 'store3'])->name('storekematian');
Route::post('/suratpengajuankematian/store4', [SuratController::class, 'store4'])->name('suratpermohonankematian');
Route::post('/suratpengajuankematian/konfirmasi/{id}', [SuratController::class, 'update1']);
Route::post('/suratpengajuankematian/setuju1/{id}', [SuratController::class, 'setuju1']);
// end


//Surat Permohonan kematian
Route::get('/suratpermohonankematian', [SuratController::class, 'suratpermohonankematian'])->name('permohonankematian');
Route::get('/surat-permohonan-kematian/{id_surat}', [SuratController::class, 'permohonankelahiran'])->name('suratkelahiran');
//end
//////////////////////////////////Surat Kematian/////////////////////////////////////////



//////////////////////////////////Surat Kurang Mampu/////////////////////////////////////////
// Surat Pengajuan kurang mampu
Route::get('/suratpengajuankurangmampu', [SuratController::class, 'suratpengajuankurangmampu'])->name('suratpengajuankurangmampu');
Route::get('/surat-pengajuan-kurang-mampu/{id}', [SuratController::class, 'pengajuankurangmampu'])->name('pengajuankurangmampu');
//end

// CRUD data kurang mampu
Route::post('/suratpengajuankurangmampu/store5', [SuratController::class, 'store5'])->name('storekurangmampu');
Route::post('/suratpengajuankurangmampu/konfirmasi/{id}', [SuratController::class, 'update2']);
Route::post('/suratpengajuankurangmampu/setuju2/{id}', [SuratController::class, 'setuju2']);
// end


//Surat Permohonan kurang mampu
Route::get('/suratpermohonankurangmampu', [SuratController::class, 'suratpermohonankurangmampu'])->name('permohonankurangmampu');
Route::get('/surat-permohonan-kurang-mampu/{id_surat}', [SuratController::class, 'permohonankurangmampu'])->name('suratkurangmampu');
//end
//////////////////////////////////Surat Kurang Mampu/////////////////////////////////////////



//////////////////////////////////Surat Pengantar/////////////////////////////////////////
// Surat Pengajuan pengantar
Route::get('/suratpengajuanpengatar', [SuratController::class, 'suratpengajuanpengatar'])->name('suratpengajuanpengatar');
Route::get('/surat-pengajuan-pengantar/{id}', [SuratController::class, 'pengajuanpengatar']);
//end

// CRUD data pengantar
Route::post('/suratpengajuanpengatar/store7', [SuratController::class, 'store7'])->name('storepengatar');
Route::post('/suratpengajuanpengantar/konfirmasi/{id}', [SuratController::class, 'update3']);
Route::post('/suratpengajuanpengantar/setuju3/{id}', [SuratController::class, 'setuju3']);
// end


//Surat Permohonan pengantar
Route::get('/suratpermohonanpengatar', [SuratController::class, 'suratpermohonanpengantar'])->name('suratpermohonanpengatar');
Route::get('/surat-permohonan-pengantar/{id_surat}', [SuratController::class, 'permohonanpengantar'])->name('permohonanpengantar');
//end
//////////////////////////////////Surat Pengatar/////////////////////////////////////////




//////////////////////////////////Surat Usaha Mikro/////////////////////////////////////////
// Surat Pengajuan Usaha Mikro
Route::get('/suratpengajuanusaha', [SuratController::class, 'suratpengajuanusaha'])->name('suratpengajuanusaha');
Route::get('/surat-pengajuan-usaha-mikro/{id}', [SuratController::class, 'pengajuanusaha'])->name('pengajuanusaha');
//end

// CRUD data Usaha Mikro
Route::post('/suratpengajuanusaha/store9', [SuratController::class, 'store9'])->name('storeusaha');
Route::post('/suratpengajuanusaha/konfirmasi/{id}', [SuratController::class, 'update4']);
Route::post('/suratpengajuanusaha/setuju4/{id}', [SuratController::class, 'setuju4']);
// end


//Surat Permohonan Usaha Mikro
Route::get('/suratpermohonanusaha', [SuratController::class, 'suratpermohonanusaha'])->name('suratpermohonanusaha');
Route::get('/surat-permohonan-usaha-mikro/{id_surat}', [SuratController::class, 'permohonanusaha'])->name('permohonanusaha');
//end
//////////////////////////////////Surat Usaha Mikro/////////////////////////////////////////


//////////////////////////////////Surat Pindah/////////////////////////////////////////
// Surat Pengajuan pindah
Route::get('/suratpengajuanpindah', [SuratController::class, 'suratpengajuanpindah'])->name('suratpengajuanpindah');
Route::get('/surat-pengajuan-pindah/{id}', [SuratController::class, 'pengajuanpindah'])->name('pengajuanpindah');
//end

// CRUD data pindah
Route::post('/suratpengajuanpindah/store11', [SuratController::class, 'store11'])->name('storepindah');
Route::post('/suratpengajuanpindah/konfirmasi/{id}', [SuratController::class, 'update5']);
Route::post('/suratpengajuanpindah/setuju5/{id}', [SuratController::class, 'setuju5']);
// end


//Surat Permohonan pindah
Route::get('/suratpermohonanpindah', [SuratController::class, 'suratpermohonanpindah'])->name('suratpermohonanpindah');
Route::get('/surat-permohonan-pindah/{id_surat}', [SuratController::class, 'permohonanpindah'])->name('permohonanpindah');
//end
//////////////////////////////////Surat Pindah/////////////////////////////////////////



//////////////////////////////////Surat e-ktp/////////////////////////////////////////
// Surat Pengajuan E-KTP
Route::get('/suratpengajuane-ktp', [SuratController::class, 'suratpengajuanktp'])->name('suratpengajuanktp');
Route::get('/surat-pengajuan-e-ktp/{id}', [SuratController::class, 'pengajuanktp'])->name('pengajuanktp');
//end

// CRUD data E-KTP
Route::post('/suratpengajuanktp/tambah', [SuratController::class, 'tambah'])->name('storektp');
Route::post('/suratpengajuanktp/konfirmasi/{id}', [SuratController::class, 'update6']);
Route::post('/suratpengajuanktp/setuju/{id}', [SuratController::class, 'setuju6']);
// end


//Surat Permohonan E-KTP
Route::get('/suratpermohonane-ktp', [SuratController::class, 'suratpermohonanktp'])->name('suratpermohonanktp');
Route::get('/surat-permohonan-e-ktp/{id_surat}', [SuratController::class, 'permohonanktp'])->name('permohonanktp');
//end
//////////////////////////////////Surat e-ktp/////////////////////////////////////////




//////////////////////////////////Master Banjar/////////////////////////////////////////
// Master Banjar
Route::get('/masterbanjar', [MasterDataController::class, 'masterbanjar'])->name('masterbanjar');
//end

// CRUD data banjar
Route::post('/masterbanjar/store', [MasterDataController::class, 'store'])->name('strorebanjar');
Route::post('/masterbanjar/update/{id}', [MasterDataController::class, 'update'])->name('updatebanjar');
// end

// Master Agama
Route::get('/masteragama', [MasterDataController::class, 'masteragama'])->name('masteragama');
//end

// CRUD data agama
Route::post('/masteragama/store1', [MasterDataController::class, 'store1'])->name('storeagama');
Route::post('/masteragama/update1/{id}', [MasterDataController::class, 'update1'])->name('updateagama');
// end

//////////////////////////////////Master Banjar/////////////////////////////////////////



//////////////////////////////////Data Laporan Kependudukan/////////////////////////////////////////
//data kependudukan
Route::get('/datakependudukan', [kependudukanController::class, 'index'])->name('datakependuduk');
//end

//data kependudukan
Route::get('/datajeniskelamin', [kependudukanController::class, 'gender'])->name('datagender');
//end

//data kependudukan
Route::get('/dataagama', [kependudukanController::class, 'agama'])->name('dataagama');
//end

//data kependudukan
Route::get('/datakelahiran', [kependudukanController::class, 'kelahiran'])->name('datakelahiran');
//end

//data kependudukan
Route::get('/datakematian', [kependudukanController::class, 'kematian'])->name('datakematian');
//end

//data kependudukan
Route::get('/datapendatang', [kependudukanController::class, 'pendatang'])->name('datapendatang');
//end

//data kependudukan
Route::get('/rekapsurat', [kependudukanController::class, 'rekapsurat'])->name('rekapsurat');
//end

//data pendidikan
Route::get('/datapendidikan', [kependudukanController::class, 'pendidikan'])->name('datapendidikan');
//end

//////////////////////////////////Data Laporan Kependudukan/////////////////////////////////////////


////////////////////////////////// SEARCH ENGINE ROUTE ///////////////////////////////////////////////
Route::get('/search', [AdminKependudukanController::class, 'search'])->name('search');


//////////////////////////////// DATA PENGAJUAN //////////////////////////////////////////
Route::get('/suratpengajuankelahiran/search', [SuratController::class, 'searchKelahiran']);
Route::get('/suratpengajuankematian/search', [SuratController::class, 'searchKematian']);
Route::get('/suratpengajuankurangmampu/search', [SuratController::class, 'searchKurang']);
Route::get('/suratpengajuanpengantar/search', [SuratController::class, 'searchPengantar']);
Route::get('/suratpengajuanktp/search', [SuratController::class, 'searchEktp']);
Route::get('/suratpengajuanpindah/search', [SuratController::class, 'searchPindah']);
Route::get('/suratpengajuanusaha/search', [SuratController::class, 'searchUsaha']);
//////////////////////////////// DATA PENGAJUAN //////////////////////////////////////////


//////////////////////////////// DATA PERMOHONAN //////////////////////////////////////////
Route::get('/suratpermohonankelahiran/search', [SuratController::class, 'searchpermohonankelahiran']);
Route::get('/suratpermohonankematian/search', [SuratController::class, 'searchpermohonankematian']);
Route::get('/suratpermohonankurangmampu/search', [SuratController::class, 'searchpermohonankurangmampu']);
Route::get('/suratpermohonanpengantar/search', [SuratController::class, 'searchpermohonanpengantar']);
Route::get('/suratpermohonane-ktp/search', [SuratController::class, 'searchpermohonanektp']);
Route::get('/suratpermohonanpindah/search', [SuratController::class, 'searchpermohonanpindah']);
Route::get('/suratpermohonanusaha/search', [SuratController::class, 'searchpermohonanusaha']);
//////////////////////////////// DATA PERMOHONAN //////////////////////////////////////////


////////////////////////////////// SEARCH ENGINE USERS ///////////////////////////////////////////////
Route::get('/tableuser/search', [AdminUserController::class, 'searchUser']);
Route::get('/tablemasyarakat/search', [AdminUserController::class, 'searchMasyarakat']);
Route::get('/tableadmin/search', [AdminUserController::class, 'searchAdmin']);
Route::get('/tablepegawai/search', [AdminUserController::class, 'searchPegawai']);
////////////////////////////////// SEARCH ENGINE USERS ///////////////////////////////////////////////



////////////////////////////////// SEARCH ENGINE LAPORAN ///////////////////////////////////////////////
Route::get('/datakependudukan/search', [KependudukanController::class, 'searchKependudukan']);
Route::get('/datajeniskelamin/search', [KependudukanController::class, 'searchGender']);
Route::get('/dataagama/search', [KependudukanController::class, 'searchAgama']);
Route::get('/datakelahiran/search', [KependudukanController::class, 'searchKelahiran']);
Route::get('/datakematian/search', [KependudukanController::class, 'searchKematian']);
Route::get('/datapendatang/search', [KependudukanController::class, 'searchPendatang']);
Route::get('/datapendidikan/search', [KependudukanController::class, 'searchPendidikan']);
Route::get('/surat/search', [KependudukanController::class, 'searchAllSurat']);
////////////////////////////////// SEARCH ENGINE LAPORAN ///////////////////////////////////////////////



////////////////////////////////// PRINT SURAT ///////////////////////////////////////////////
 Route::get('/printsearchmys', [AdminKependudukanController::class, 'printsearch'])->name('printsearch');

Route::get('/print-permohonan/{id_surat}', [SuratController::class, 'printsurat']);
Route::get('/print-ktp/{id_surat}', [SuratController::class, 'printktp']);
Route::get('/datakependudukan/printsearchmys', [KependudukanController::class, 'printSearchKependudukan']);
Route::get('/datajeniskelamin/printsearchmys', [KependudukanController::class, 'printSearchGender']);
Route::get('/dataagama/printsearchmys', [KependudukanController::class, 'printSearchAgama']);
Route::get('/datakelahiran/printsearchmys', [KependudukanController::class, 'printSearchKelahiran']);
Route::get('/datakematian/printsearchmys', [KependudukanController::class, 'printSearchKematian']);
Route::get('/datapendatang/printsearchmys', [KependudukanController::class, 'printSearchPendatang']);
Route::get('/rekapsurat/printsearchmys', [KependudukanController::class, 'printSearchRekapSurat']);
Route::get('/datapendidikan/printsearchmys', [KependudukanController::class, 'printSearchPendidikan']);
////////////////////////////////// PRINT SURAT ///////////////////////////////////////////////


////////////////////////////////// ALERT ///////////////////////////////////////////////
Route::post('/dashboard/alertdashboard/{id}', [AlertController::class, 'alertdashboard']);
Route::post('/dashboard/alertdashboard1/{id_surat}', [AlertController::class, 'alertdashboard1']);
Route::post('/dashboard/alertdashboard2/{id}', [AlertController::class, 'alertdashboard2']);


Route::post('/alert/alertadmin/{jenis}', [AlertController::class, 'alert']);

Route::post('/alert/alertadmin1/{jenis}', [AlertController::class, 'alert1']);

Route::post('/alert/alert2/{jenis}', [AlertController::class, 'alert2']);


Route::get('/alert', [AlertController::class, 'index'])->name('alert');
Route::get('/alertread', [AlertController::class, 'alertread'])->name('alertread');


Route::get('/alertadmin', [AlertController::class, 'alertadmin'])->name('alertadmin');
Route::get('/alertadminread', [AlertController::class, 'alertadminread'])->name('alertadminread');
////////////////////////////////// ALERT ///////////////////////////////////////////////
