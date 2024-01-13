<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function __construct()
     {
         $this->middleware(['auth']);
     }

    public function index()
    {
        
        $penduduk=DB::table('register')->get();
        $banjar=DB::table('master_banjar')->get();
        $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->get();
        $asli=DB::table('register')->where('masyarakat', 'asli')->get();
        $datasurat=DB::table('pengajuan_surat')->get();
        
        $identitas=DB::table('users')
        ->join('register', 'register.id_register', '=', 'users.id_register')
        ->where('users.id_register', auth()->user()->id_register)
        ->get();

        $data = DB::table('register')->select('no_kk')->get();
        $nodouble = $data->unique('no_kk');

        $datatahun = DB::table('register')->select('tahun')->get();
        $nodouble2 = $datatahun->unique('tahun');

        return view('page.dashboard', compact('penduduk', 'pendatang', 'asli', 'banjar', 'data', 'nodouble', 'nodouble2', 'datasurat', 'identitas'));
    }

    public function chart()
    {
        $result = DB::table('chart_penduduk')
            ->where('ket','=','penduduk')
            ->orderBy('tahun', 'ASC')
            ->get();
        $nodouble = $result->unique('tahun');
        return response()->json($result);
    }

    public function chart1()
    {
        $result = DB::table('chart_penduduk1')
            ->get();
        $nodouble = $result->unique('id');
        return response()->json($result);
    }

    
}
