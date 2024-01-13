<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }



    ///////////////////////////////////////////////////////////////////
    ////////////////////STRAT CONTROLLER KELAHIRAN////////////////////
    //////////////////////////////////////////////////////////////////





    public function searchKelahiran(Request $request)
    {
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'kelahiran',)->orderBy('id_surat', 'DESC')->get(); 
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kelahiran',)->get();

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'kelahiran',)->orderBy('id', 'DESC')->get();
        
        $pengajuan1=DB::table('pengajuan_surat')
        ->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kelahiran')->orderBy('id', 'DESC')->get();

        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKK'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kelahiran',)->
            where('pengajuan_surat.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kelahiran',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kelahiran',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->value && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->value && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datapengajuan.pengajuankelahiran', compact('pengajuan','pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }





    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN KELAHIRAN/////////////////
    //////////////////////////////////////////////////////////////
    public function suratpengajuankelahiran()
    {
        //kode pengajuan
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'kelahiran',)->orderBy('id_surat', 'DESC')->get(); 
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->where('jenis_surat', 'kelahiran',)->get();

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'kelahiran',)->orderBy('id', 'DESC')->get();
        
        $pengajuan1=DB::table('pengajuan_surat')
        ->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kelahiran')->orderBy('id', 'DESC')->get();

        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKL'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        
        return view('page.datapengajuan.pengajuankelahiran', compact('pengajuan','pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN KELAHIRAN/////////////////
    //////////////////////////////////////////////////////////////






    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////
    public function store(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'value' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $pengajuan = DB::table('pengajuan_surat')->insert([
            'id' => $request->id,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        $pengajuan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'value'   => $request->value,
            'jenis'   => $request->jenis,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'value' => $request->value,
            'jenis' => $request->jenis,
        ]);

         
        if($pengajuan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpengajuankelahiran')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuankelahiran')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////




    public function searchpermohonankelahiran(Request $request)
    {
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran',)->orderBy('id', 'DESC')->get();     

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kelahiran',)->orderBy('id_surat', 'DESC')->get();
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'kelahiran',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kelahiran',)->orderBy('id_surat', 'DESC')->get();        
        $penduduk=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('surat_permohonan.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->banjar && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->banjar && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kelahiran',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datasurat.datasuratkelahiran', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    }



    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN KELAHIRAN////////////////
    //////////////////////////////////////////////////////////////
    public function suratpermohonankelahiran()
    {    
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran',)->orderBy('id_surat', 'DESC')->get();     

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kelahiran',)->orderBy('id_surat', 'DESC')->get();
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'kelahiran',)->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kelahiran',)->orderBy('id', 'DESC')->get();        
        $penduduk=DB::table('register')->get();

        return view('page.datasurat.datasuratkelahiran', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    }
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN KELAHIRAN////////////////
    //////////////////////////////////////////////////////////////
    
    


    
    

    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////
    public function setuju(Request $request)
    {
        $permohonan = DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'id' => $request->id,
            'value' => $request->value,
        ]);

        $this->validate($request, [
            'id_surat' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $permohonan = DB::table('surat_permohonan')->insert([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        
        $permohonan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
            'jenis'   => $request->jenis,    
        ]);

        
        if($permohonan){
            //redirect dengan pesan sukses
            return redirect()->route('permohonankelahiran')->with('success', 'Berhasil di setujui dan siap dicetak');
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuankelahiran')->with(['error' => 'Gagal dalam memproses!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////


    
    


    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////
    public function update(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        return redirect()->route('suratpengajuankelahiran')->with('konfirmasi', 'Berhasil di konfirmasi');
    }
    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////




    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////
    public function pengajuankelahiran(Request $request)
    {   
        $pengajuan = DB::table('pengajuan_surat')->where('id',$request->id)->get();
        return view('pengajuan.pengajuansurat', compact('pengajuan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PENGAJUAN SURAT///////////////////
    //////////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN SURAT////////////////
    //////////////////////////////////////////////////////////////
    public function permohonankelahiran(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.surat', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PERMOHONAN SURAT//////////////////
    //////////////////////////////////////////////////////////////


    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN PRINT////////////////
    //////////////////////////////////////////////////////////////
    public function printsurat(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.print', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PERMOHONAN PRINT//////////////////
    //////////////////////////////////////////////////////////////

    
   

    ///////////////////////////////////////////////////////////////////
    ////////////////////END CONTROLLER KELAHIRAN//////////////////////
    //////////////////////////////////////////////////////////////////














    ///////////////////////////////////////////////////////////////////
    ////////////////////STRAT CONTROLLER KEMATIAN/////////////////////
    //////////////////////////////////////////////////////////////////



    public function searchKematian(Request $request)
    {
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'kematian',)->orderBy('id_surat', 'DESC')->get(); 
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id_surat', 'DESC')->get();

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        
        $pengajuan1=DB::table('pengajuan_surat')
        ->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian')->orderBy('id', 'DESC')->get();

        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKK'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kematian',)->
            where('pengajuan_surat.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kematian',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kematian',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->value && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->value && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datapengajuan.pengajuankematian', compact('pengajuan','pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN KEMATIAN//////////////////
    //////////////////////////////////////////////////////////////
    public function suratpengajuankematian()
    {
        //kode pengajuan
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'kematian',)->orderBy('id_surat', 'DESC')->get();
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id_surat', 'DESC')->get(); 

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();

        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKK'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        
        return view('page.datapengajuan.pengajuankematian', compact('pengajuan', 'pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN KEMATIAN//////////////////
    //////////////////////////////////////////////////////////////






    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////
    public function store3(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'value' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $pengajuan = DB::table('pengajuan_surat')->insert([
            'id' => $request->id,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'value' => $request->value,
            'jenis' => $request->jenis,
        ]);

        $pengajuan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'value'   => $request->value,
            'jenis'   => $request->jenis,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);
         
        if($pengajuan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpengajuankematian')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuankematian')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////



    public function searchpermohonankematian(Request $request)
    {
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian',)
        ->orderBy('id_surat', 'DESC')
        ->get();     

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id_surat', 'DESC')->get();
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();        
        $penduduk=DB::table('register')
        ->orderBy('id', 'DESC')
        ->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('surat_permohonan.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->banjar && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->banjar && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kematian',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datasurat.datasuratkematian', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    }
    


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN KEMATIAN////////////////
    //////////////////////////////////////////////////////////////
    public function suratpermohonankematian()
    {    
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian',)
        ->orderBy('id_surat', 'DESC')
        ->get();

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)
        ->orderBy('id_surat', 'DESC')
        ->get();                
        $penduduk=DB::table('register')
        ->get();

        return view('page.datasurat.datasuratkematian', compact('surat', 'surat1', 'penduduk', 'pengajuan1', 'pengajuan'));
    } 
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN KEMATIAN////////////////
    //////////////////////////////////////////////////////////////
    





    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////
    public function setuju1(Request $request)
    {
        $this->validate($request, [
            'id_surat' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $permohonan = DB::table('surat_permohonan')->insert([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        
        $permohonan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
            'jenis'   => $request->jenis,    
        ]);

        $permohonan = DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'value' => $request->value,
        ]);

        if($permohonan){
            //redirect dengan pesan sukses
            return redirect()->route('permohonankematian')->with('success', 'Berhasil di setujui dan siap dicetak');
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuankematian')->with(['error' => 'Gagal dalam memproses!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////







    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////
    public function update1(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        return redirect()->route('suratpengajuankematian')->with('konfirmasi', 'Berhasil di konfirmasi');
    }
    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////
    public function pengajuankematian(Request $request)
    {   
        $pengajuan = DB::table('pengajuan_surat')->where('id',$request->id)->get();
        return view('pengajuan.pengajuansurat', compact('pengajuan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////

    



    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN SURAT////////////////
    //////////////////////////////////////////////////////////////

    public function permohonankematian(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.surat', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN SURAT////////////////
    //////////////////////////////////////////////////////////////



   

    ///////////////////////////////////////////////////////////////////
    ////////////////////END CONTROLLER KEMATIAN///////////////////////
    //////////////////////////////////////////////////////////////////








    ///////////////////////////////////////////////////////////////////
    ////////////////////START CONTROLLER KURANG MAMPU//////////////////
    //////////////////////////////////////////////////////////////////


    public function searchKurang(Request $request)
    {
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'kurang mampu',)->orderBy('id_surat', 'DESC')->get(); 
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kurang mampu',)->orderBy('id_surat', 'DESC')->get();

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'kurang mampu',)
        ->orderBy('id', 'DESC')
        ->get();
        
        $pengajuan1=DB::table('pengajuan_surat')
        ->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kurang mampu')
        ->get();

        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKM'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kurang mampu',)->
            where('pengajuan_surat.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kurang mampu',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'kurang mampu',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->value && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->value && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datapengajuan.pengajuankurangmampu', compact('pengajuan','pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN KURANG MAMPU//////////////
    //////////////////////////////////////////////////////////////
    public function suratpengajuankurangmampu()
    {
        //kode pengajuan
        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'kurang mampu',)
        ->orderBy('id', 'DESC')
        ->get();

        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)
        ->where('jenis_surat', 'kurang mampu',)
        ->orderBy('id', 'DESC')
        ->get();

        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'kurang mampu',)
        ->orderBy('id_surat', 'DESC')
        ->get();
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)
        ->orderBy('id_surat', 'DESC')
        ->get();
        $penduduk=DB::table('register')
        ->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKM'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        
        return view('page.datapengajuan.pengajuankurangmampu', compact('pengajuan', 'pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN KURANG MAMPU//////////////
    //////////////////////////////////////////////////////////////






    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////
    public function store5(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'value' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $pengajuan = DB::table('pengajuan_surat')->insert([
            'id' => $request->id,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'value' => $request->value,
            'jenis' => $request->jenis,
        ]);

        $pengajuan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'value'   => $request->value,
            'jenis'   => $request->jenis,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);
         
        if($pengajuan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpengajuankurangmampu')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuankurangmampu')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////

  
    public function searchpermohonankurangmampu(Request $request)
    {
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kurang mampu',)
        ->orderBy('id_surat', 'DESC')
        ->get();     

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id_surat', 'DESC')->get();
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();        
        $penduduk=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('surat_permohonan.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->banjar && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->banjar && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'kurang mampu',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datasurat.datasuratkurangmampu', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    }


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN KURANG MAMPU/////////////
    //////////////////////////////////////////////////////////////
    public function suratpermohonankurangmampu()
    {    
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'kurang mampu',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->orderBy('id', 'DESC')->get();

        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kurang mampu',)
        ->orderBy('id_surat', 'DESC')
        ->get();

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)
        ->orderBy('id_surat', 'DESC')
        ->get();                
        $penduduk=DB::table('register')
        ->get();

        return view('page.datasurat.datasuratkurangmampu', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    } 
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN KURANG MAMPU/////////////
    //////////////////////////////////////////////////////////////







    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////
    public function setuju2(Request $request)
    {
        $this->validate($request, [
            'id_surat' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $permohonan = DB::table('surat_permohonan')->insert([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        
        $permohonan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
            'jenis'   => $request->jenis,    
        ]);

        $permohonan = DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'value' => $request->value,
        ]);

        if($permohonan){
            //redirect dengan pesan sukses
            return redirect()->route('permohonankurangmampu')->with('success', 'Berhasil di setujui dan siap dicetak');
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuankurangmampu')->with(['error' => 'Gagal dalam memproses!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////

    


    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////
    public function update2(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        return redirect()->route('suratpengajuankurangmampu')->with('konfirmasi', 'Berhasil di konfirmasi');
    }
    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////



    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////

    public function pengajuankurangmampu(Request $request)
    {   
        $pengajuan = DB::table('pengajuan_surat')->where('id',$request->id)->get();
        return view('pengajuan.pengajuansurat', compact('pengajuan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////



    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN SURAT////////////////
    //////////////////////////////////////////////////////////////
    public function permohonankurangmampu(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.surat', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PERMOHONAN SURAT//////////////////
    //////////////////////////////////////////////////////////////

    
   

    ///////////////////////////////////////////////////////////////////
    ////////////////////END CONTROLLER KELAHIRAN//////////////////////
    //////////////////////////////////////////////////////////////////









    ///////////////////////////////////////////////////////////////////
    ////////////////////STRAT CONTROLLER PENGANTAR////////////////////
    //////////////////////////////////////////////////////////////////


    public function searchPengantar(Request $request)
    {
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'pengantar',)->orderBy('id_surat', 'DESC')->get(); 
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'pengantar',)->orderBy('id_surat', 'DESC')->get();

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'pengantar',)->orderBy('id', 'DESC')->get();
        
        $pengajuan1=DB::table('pengajuan_surat')
        ->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'pengantar')
        ->orderBy('id', 'DESC')
        ->get();

        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKP'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'pengantar',)->
            where('pengajuan_surat.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'pengantar',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'pengantar',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->value && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->value && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datapengajuan.pengajuanpengantar', compact('pengajuan','pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN PENGANTAR/////////////////
    //////////////////////////////////////////////////////////////
    public function suratpengajuanpengatar()
    {
        //kode pengajuan
        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'pengantar',)
        ->orderBy('id', 'DESC')
        ->get();

        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)
        ->where('jenis_surat', 'pengantar',)->orderBy('id', 'DESC')->get();
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'pengantar',)->orderBy('id_surat', 'DESC')->get();
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->get();                
        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKP'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        
        return view('page.datapengajuan.pengajuanpengantar', compact('pengajuan', 'pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN PENGANTAR/////////////////
    //////////////////////////////////////////////////////////////






    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////
    public function store7(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'value' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $pengajuan = DB::table('pengajuan_surat')->insert([
            'id' => $request->id,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'value' => $request->value,
            'jenis' => $request->jenis,
        ]);

        $pengajuan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'value'   => $request->value,
            'jenis'   => $request->jenis,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]); 

        if($pengajuan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpengajuanpengatar')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuanpengatar')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////



    public function searchpermohonanpengantar(Request $request)
    {
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'pengantar',)
        ->orderBy('id_surat', 'DESC')
        ->get();     

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'pengantar',)
        ->orderBy('id_surat', 'DESC')
        ->get();
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'pengantar',)
        ->orderBy('id', 'DESC')
        ->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'pengantar',)
        ->orderBy('id', 'DESC')
        ->get();        
        $penduduk=DB::table('register')
        ->orderBy('id', 'DESC')
        ->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('surat_permohonan.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->banjar && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->banjar && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pengantar',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datasurat.datasuratpengantar', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    }


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN PENGANTAR////////////////
    //////////////////////////////////////////////////////////////
    public function suratpermohonanpengantar()
    {    
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'pengantar',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->orderBy('id', 'DESC')->get();

        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->where('jenis_surat', 'pengantar',)->orderBy('id_surat', 'DESC')->get();

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->get();                
        $penduduk=DB::table('register')->get();

        return view('page.datasurat.datasuratpengantar', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    } 
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN PENGANTAR////////////////
    //////////////////////////////////////////////////////////////

    
     

    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////
    public function setuju3(Request $request)
    {
        $this->validate($request, [
            'id_surat' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $permohonan = DB::table('surat_permohonan')->insert([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        
        $permohonan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
            'jenis'   => $request->jenis,    
        ]);

        $permohonan = DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'value' => $request->value,
        ]);

        if($permohonan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpermohonanpengatar')->with('success', 'Berhasil di setujui dan siap dicetak');
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuanpengatar')->with(['error' => 'Gagal dalam memproses!']);
        }
    }

    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////






    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////
    public function update3(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        return redirect()->route('suratpengajuanpengatar')->with('konfirmasi', 'Berhasil di konfirmasi');
    }
    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////

    public function pengajuanpengatar(Request $request)
    {   
        $pengajuan = DB::table('pengajuan_surat')->where('id',$request->id)->get();
        return view('pengajuan.pengajuansurat', compact('pengajuan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PENGAJUAN SURAT///////////////////
    //////////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN SURAT////////////////
    //////////////////////////////////////////////////////////////
    public function permohonanpengantar(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.surat', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PERMOHONAN SURAT//////////////////
    //////////////////////////////////////////////////////////////

    
   

    ///////////////////////////////////////////////////////////////////
    ////////////////////END CONTROLLER KELAHIRAN//////////////////////
    //////////////////////////////////////////////////////////////////









    ///////////////////////////////////////////////////////////////////
    ////////////////////STRAT CONTROLLER USAHA////////////////////////
    //////////////////////////////////////////////////////////////////


    public function searchUsaha(Request $request)
    {
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'usaha mikro',)->orderBy('id_surat', 'DESC')->get(); 
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'usaha mikro',)->orderBy('id_surat', 'DESC')->get();

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'usaha mikro',)->orderBy('id', 'DESC')->get();
        
        $pengajuan1=DB::table('pengajuan_surat')
        ->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'usaha mikro')->orderBy('id', 'DESC')->get();

        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKH'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'usaha mikro',)->
            where('pengajuan_surat.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'usaha mikro',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'usaha mikro',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->value && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->value && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datapengajuan.pengajuanusaha', compact('pengajuan','pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }

    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN USAHA/////////////////////
    //////////////////////////////////////////////////////////////
    public function suratpengajuanusaha()
    {
        //kode pengajuan
        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'usaha mikro',)->get();

        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'usaha mikro',)->orderBy('id', 'DESC')->get();
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'usaha mikro',)->orderBy('id_surat', 'DESC')->get();  
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->get();
        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKUH'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        
        return view('page.datapengajuan.pengajuanusaha', compact('pengajuan', 'pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN USAHA/////////////////////
    //////////////////////////////////////////////////////////////







    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////
    public function store9(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'value' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'value' => $request->value,
            'jenis' => $request->jenis,
        ]);

        $pengajuan = DB::table('pengajuan_surat')->insert([
            'id' => $request->id,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        $pengajuan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'value'   => $request->value,
            'jenis'   => $request->jenis,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

         
        if($pengajuan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpengajuanusaha')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuanusaha')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////


    public function searchpermohonanusaha(Request $request)
    {
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'usaha mikro',)
        ->orderBy('id', 'DESC')
        ->get();     

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();        
        $penduduk=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('surat_permohonan.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->banjar && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->banjar && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'usaha mikro',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datasurat.datasuratusaha', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    }    


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN USAHA////////////////////
    //////////////////////////////////////////////////////////////

    public function suratpermohonanusaha()
    {    
        $pengajuan=DB::table('pengajuan_surat')
        ->where('jenis_surat', 'usaha mikro',)->orderBy('id', 'DESC')->get();

        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->get();
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->where('jenis_surat', 'usaha mikro',)->orderBy('id_surat', 'DESC')->get();  

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->get();              
        $penduduk=DB::table('register')->get();

        return view('page.datasurat.datasuratusaha', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1'));
    } 
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN USAHA////////////////////
    //////////////////////////////////////////////////////////////

    

    

    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////
    public function setuju4(Request $request)
    {
        $this->validate($request, [
            'id_surat' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $permohonan = DB::table('surat_permohonan')->insert([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        
        $permohonan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
            'jenis'   => $request->jenis,    
        ]);

        $permohonan = DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'value' => $request->value,
        ]);

        if($permohonan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpermohonanusaha')->with('success', 'Berhasil di setujui dan siap dicetak');
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuanusaha')->with(['error' => 'Gagal dalam memproses!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////



    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////

    public function update4(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        return redirect()->route('suratpengajuanusaha')->with('konfirmasi', 'Berhasil di konfirmasi');
    }
    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////
    public function pengajuanusaha(Request $request)
    {   
        $pengajuan = DB::table('pengajuan_surat')->where('id',$request->id)->get();
        return view('pengajuan.pengajuansurat', compact('pengajuan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PENGAJUAN SURAT///////////////////
    //////////////////////////////////////////////////////////////




    
    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN SURAT////////////////
    //////////////////////////////////////////////////////////////
    public function permohonanusaha(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.surat', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PERMOHONAN SURAT//////////////////
    //////////////////////////////////////////////////////////////

    
   

    ///////////////////////////////////////////////////////////////////
    ////////////////////END CONTROLLER USAHA//////////////////////////
    //////////////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////////
    /////////////START CONTORELLER PINDAH//////////////////////////
    //////////////////////////////////////////////////////////////



    public function searchPindah(Request $request)
    {
        $identitas=DB::table('users')
        ->join('register', 'register.id_register', '=', 'users.id_register')
        ->where('users.id_register', auth()->user()->id_register)
        ->get();

        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'pindah',)->orderBy('id_surat', 'DESC')->get(); 
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'pindah',)->orderBy('id_surat', 'DESC')->get();

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'pindah',)->orderBy('id', 'DESC')->get();
        
        $pengajuan1=DB::table('pengajuan_surat')
        ->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'pindah')->orderBy('id', 'DESC')->get();

        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKH'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'pindah',)->
            where('pengajuan_surat.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'pindah',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'pindah',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->value && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->value && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datapengajuan.pengajuanpindah', compact('pengajuan','pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1', 'identitas'));
    }

    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN PINDAH////////////////////
    //////////////////////////////////////////////////////////////
    public function suratpengajuanpindah()
    {
        //kode pengajuan
        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'pindah',)->orderBy('id', 'DESC')->get();
        
        $identitas=DB::table('users')
        ->join('register', 'register.id_register', '=', 'users.id_register')
        ->where('users.id_register', auth()->user()->id_register)
        ->get();

;
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'pindah',)->orderBy('id', 'DESC')->get();
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'pindah',)->orderBy('id_surat', 'DESC')->get();  
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->get();              
        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKH'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        
        return view('page.datapengajuan.pengajuanpindah', compact('pengajuan', 'pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1', 'identitas'));
    }
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN PINDAH////////////////////
    //////////////////////////////////////////////////////////////




    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////
    public function store11(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $pengajuan = DB::table('pengajuan_surat')->insert([
            'id' => $request->id,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'value' => $request->value,
            'jenis' => $request->jenis,
        ]);

        $pengajuan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

         
        if($pengajuan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpengajuanpindah')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuanpindah')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////


    public function searchpermohonanpindah(Request $request)
    {
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'pindah',)->orderBy('id_surat', 'DESC')->get();     

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->where('jenis_surat', 'kematian',)->get();
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'kematian',)->orderBy('id', 'DESC')->get();        
        $penduduk=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('surat_permohonan.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->banjar && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->banjar && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'pindah',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datasurat.datasuratpindah', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1', 'surat', 'surat1' ));
    }


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN PINDAH///////////////////
    //////////////////////////////////////////////////////////////
    public function suratpermohonanpindah()
    {    
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'pindah',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->orderBy('id', 'DESC')->get();

        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'pindah',)->orderBy('id_surat', 'DESC')->get();

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->get();              
        $penduduk=DB::table('register')->get();

        return view('page.datasurat.datasuratpindah', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1', 'surat', 'surat1' ));
    } 
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN PINDAH///////////////////
    //////////////////////////////////////////////////////////////




    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////
    public function setuju5(Request $request)
    {
        $this->validate($request, [
            'id_surat' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $permohonan = DB::table('surat_permohonan')->insert([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        
        $permohonan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
            'jenis'   => $request->jenis,    
        ]);

        $permohonan = DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'value' => $request->value,
        ]);

        if($permohonan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpermohonanpindah')->with('success', 'Berhasil di setujui dan siap dicetak');
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuanpindah')->with(['error' => 'Gagal dalam memproses!']);
        }
    }

    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////




    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////
    public function update5(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        return redirect()->route('suratpengajuanpindah')->with('konfirmasi', 'Berhasil di konfirmasi');
    }
    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////




    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////
    public function pengajuanpindah(Request $request)
    {   
        $pengajuan = DB::table('pengajuan_surat')->where('id',$request->id)->get();
        return view('pengajuan.pengajuansurat', compact('pengajuan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PENGAJUAN SURAT///////////////////
    //////////////////////////////////////////////////////////////




    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN SURAT////////////////
    //////////////////////////////////////////////////////////////
    public function permohonanpindah(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.surat', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PERMOHONAN SURAT//////////////////
    //////////////////////////////////////////////////////////////

    
   

    ///////////////////////////////////////////////////////////////////
    ////////////////////END CONTROLLER PINDAH/////////////////////////
    //////////////////////////////////////////////////////////////////


    







    ///////////////////////////////////////////////////////////////////
    ////////////////////STRAT CONTROLLER E-KTP////////////////////////
    //////////////////////////////////////////////////////////////////


    public function searchEktp(Request $request)
    {
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'e-ktp',)->orderBy('id_surat', 'DESC')->get(); 
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'e-ktp',)->orderBy('id_surat', 'DESC')->get();

        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'e-ktp',)->orderBy('id', 'DESC')->get();
        
        $pengajuan1=DB::table('pengajuan_surat')
        ->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'e-ktp')->orderBy('id', 'DESC')->get();

        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKP'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'e-ktp',)->
            where('pengajuan_surat.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'e-ktp',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value)
        {
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')->
            where('jenis_surat', 'e-ktp',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            get();
        }

        if ($request->value && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->value && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->value && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->value)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $pengajuan=DB::table('pengajuan_surat')->
            join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')->
            select('pengajuan_surat.*', 'register.banjar')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('pengajuan_surat.value', 'like', '%'.$request->value.'%')->
            where('pengajuan_surat.nama', 'like', '%'.$request->nama.'%')->
            where('pengajuan_surat.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datapengajuan.pengajuanktp', compact('pengajuan','pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }


    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN E-KTP/////////////////////
    //////////////////////////////////////////////////////////////
    public function suratpengajuanktp()
    {
        //kode pengajuan
        $pengajuan=DB::table('pengajuan_surat')
        ->join('register', 'register.id_register', '=', 'pengajuan_surat.id_register')
        ->select('pengajuan_surat.*', 'register.banjar', 'pengajuan_surat.created_at')
        ->where('jenis_surat', 'e-ktp',)
        ->orderBy('id', 'DESC')->get();

        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'e-ktp',)->orderBy('id', 'DESC')->get();
        $surat=DB::table('surat_permohonan')->where('jenis_surat', 'e-ktp',)->get();  
        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->get();              
        $penduduk=DB::table('register')->get();
        $getid=DB::table('pengajuan_surat')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'SP'. sprintf("%04s", $idbaru).'/'.date('dmY');

        //kode surat
        $getid1=DB::table('surat_permohonan')->orderBy('id_surat', 'DESC')->take(1)->get();
        foreach ($getid1 as $value);
        $terakhir1 = $value->id_surat;
        $idbaru1 = $terakhir1 + 1;

        $kode1 = 'SKTP'.$idbaru1.'/'.date('dm').'.'.$idbaru1.'/'.'pem'.'/'.'I'.'/'.date('Y') ;
        
        return view('page.datapengajuan.pengajuanktp', compact('pengajuan', 'pengajuan1', 'idbaru', 'kode', 'idbaru1', 'kode1', 'penduduk', 'surat', 'surat1'));
    }
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PENGAJUAN KELAHIRAN/////////////////
    //////////////////////////////////////////////////////////////




    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////
    public function tambah(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'value' => 'required',
            'jenis' => 'required',
            'kode_pos' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'jenis_permohonan' => 'nullable',
            'created_at' => 'required',
        ]);

        $pengajuan = DB::table('pengajuan_surat')->insert([
            'id' => $request->id,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'kode_pos'   => $request->kode_pos,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'jenis_permohonan'   => $request->jenis_permohonan,
            'created_at'   => $request->created_at,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'value' => $request->value,
            'jenis' => $request->jenis,
        ]);

        $pengajuan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'value'   => $request->value,
            'jenis'   => $request->jenis,
            'kode_pos'   => $request->kode_pos,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'jenis_permohonan'   => $request->jenis_permohonan,
            'created_at'   => $request->created_at,
        ]);

         
        if($pengajuan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpengajuanktp')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuanktp')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PENGAJUAN///////////////////////
    //////////////////////////////////////////////////////////////


    public function searchpermohonanektp(Request $request)
    {
        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'e-ktp',)->orderBy('id_surat', 'DESC')->get();     

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'e-ktp',)->orderBy('id_surat', 'DESC')->get();
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'e-ktp',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->where('jenis_surat', 'e-ktp',)->orderBy('id', 'DESC')->get();        
        $penduduk=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat )
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            get();
        }


        if ($request->created_at)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('surat_permohonan.created_at', 'like', '%'.$request->created_at.'%')->
            get();
        }

        if ($request->nama)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar)
        {
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_surat && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            get();
        }

        if ($request->banjar && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->banjar && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        if ($request->banjar && $request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $surat=DB::table('surat_permohonan')
            ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
            ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
            ->where('jenis_surat', 'e-ktp',)->
            where('kode_surat', 'like', '%'.$request->kode_surat.'%')->
            where('register.banjar', 'like', '%'.$request->banjar.'%')->
            where('surat_permohonan.nama', 'like', '%'.$request->nama.'%')->
            where('surat_permohonan.created_at', 'like', '%'.$created.'%')->
            get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.datasurat.datasuratktp', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1', 'surat', 'surat1' ));
    }
    

    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN E-KTP////////////////////
    //////////////////////////////////////////////////////////////
    public function suratpermohonanktp()
    {    
        $pengajuan=DB::table('pengajuan_surat')->where('jenis_surat', 'e-ktp',)->orderBy('id', 'DESC')->get();
        $pengajuan1=DB::table('pengajuan_surat')->where('id_register', auth()->user()->id_register)->orderBy('id', 'DESC')->get();

        $surat=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'e-ktp',)->orderBy('id_surat', 'DESC')->get();

        $surat1=DB::table('surat_permohonan')->where('id_register', auth()->user()->id_register)->orderBy('id_surat', 'DESC')->get();              
        $penduduk=DB::table('register')->get();

        return view('page.datasurat.datasuratktp', compact('surat', 'surat1', 'penduduk', 'pengajuan', 'pengajuan1', 'surat', 'surat1' ));
    } 
    ////////////////////////////////////////////////////////////////
    /////////////TAMPILAN DATA PERMOHONAN E-KTP////////////////////
    //////////////////////////////////////////////////////////////

    
    

   

    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////
    public function setuju6(Request $request)
    {
        $this->validate($request, [
            'id_surat' => 'required',
            'kode_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'tempat_lahir' => 'required',
            'gender' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'jenis' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'status_perkawinan' => 'required',
            'jenis_permohonan' => 'required',
            'kode_pos' => 'required',
            'pekerjaan' => 'required',
            'keterangan' => 'nullable',
            'created_at' => 'required',
        ]);

        $permohonan = DB::table('surat_permohonan')->insert([
            'id_surat' => $request->id_surat,
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'kode_pos'   => $request->kode_pos,
            'jenis_permohonan'   => $request->jenis_permohonan,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
        ]);

        
        $permohonan = DB::table('master_surat')->insert([
            'kode_surat' => $request->kode_surat,
            'jenis_surat' => $request->jenis_surat,
            'nik'     => $request->nik,
            'agama'     => $request->agama,
            'id_register'     => $request->id_register,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'tempat_lahir'   => $request->tempat_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'pekerjaan'   => $request->pekerjaan,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'kode_pos'   => $request->kode_pos,
            'jenis_permohonan'   => $request->jenis_permohonan,
            'status_perkawinan'   => $request->status_perkawinan,
            'keterangan'   => $request->keterangan,
            'created_at'   => $request->created_at,
            'jenis'   => $request->jenis,    
        ]);

        $permohonan = DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'value' => $request->value,
        ]);

        if($permohonan){
            //redirect dengan pesan sukses
            return redirect()->route('suratpermohonanktp')->with('success', 'Berhasil di setujui dan siap dicetak');
        }else{
            //redirect dengan pesan error
            return redirect()->route('suratpengajuanktp')->with(['error' => 'Gagal dalam memproses!']);
        }
    }

    ////////////////////////////////////////////////////////////////
    //////////////////INSERT SURAT PERMOHONAN//////////////////////
    //////////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////
    public function update6(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        DB::table('master_surat')->where('id',$request->id)->update([
            'konfirmasi' => $request->konfirmasi,
            'value' => $request->value,
        ]);

        return redirect()->route('suratpengajuanktp')->with('konfirmasi', 'Berhasil di konfirmasi');
    }
    ////////////////////////////////////////////////////////////////
    //////////////////KONFIRMASI SURAT PERMOHONAN//////////////////
    //////////////////////////////////////////////////////////////



    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////
    public function pengajuanktp(Request $request)
    {   
        $pengajuan = DB::table('pengajuan_surat')->where('id',$request->id)->get();
        return view('pengajuan.pengajuansuratktp', compact('pengajuan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PENGAJUAN SURAT/////////////////
    //////////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN SURAT////////////////
    //////////////////////////////////////////////////////////////
    public function permohonanktp(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.suratktp', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PERMOHONAN SURAT//////////////////
    //////////////////////////////////////////////////////////////


    ////////////////////////////////////////////////////////////////
    ///////////////////START SURAT PERMOHONAN print////////////////
    //////////////////////////////////////////////////////////////
    public function printktp(Request $request)
    {   
        $permohonan = DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->get();
        return view('surat.printktp', compact('permohonan'));
    }
    ////////////////////////////////////////////////////////////////
    ///////////////////END SURAT PERMOHONAN print//////////////////
    //////////////////////////////////////////////////////////////

    
   

    ///////////////////////////////////////////////////////////////////
    ////////////////////END CONTROLLER KELAHIRAN//////////////////////
    //////////////////////////////////////////////////////////////////    
}
