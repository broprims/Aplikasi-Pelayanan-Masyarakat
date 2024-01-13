<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterDataController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // pengajuan master banjar
    public function masterbanjar()
    {
        //kode pengajuan
        $masterbanjar=DB::table('master_banjar')->get();
        $masteragama=DB::table('master_agama')->get();
        $penduduk=DB::table('register')->get();
        $getid=DB::table('master_banjar')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'B'. sprintf("%04s", $idbaru);
        
        return view('master.masterbanjar', compact('masterbanjar', 'idbaru', 'kode','penduduk', 'masteragama'));
    }

    // insert
    public function store(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_banjar' => 'required',
            'nik' => 'required',
            'id_register' => 'required',
            'nama_kelian' => 'required',
            'nama_banjar' => 'required',
            'alamat' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);

        $banjar = DB::table('master_banjar')->insert([
            'id' => $request->id,
            'kode_banjar' => $request->kode_banjar,
            'nama_banjar' => $request->nama_banjar,
            'nik'     => $request->nik,
            'id_register'     => $request->id_register,
            'nama_kelian'   => $request->nama_kelian,
            'alamat'   => $request->alamat,
            'created_at'   => $request->created_at,
            'updated_at'   => $request->updated_at,
        ]);

         
        if($banjar){
            //redirect dengan pesan sukses
            return redirect()->route('masterbanjar')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('masterbanjar')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    // insert end


    // edit 
    public function update(Request $request)
    {
        DB::table('master_banjar')->where('id',$request->id)->update([
            'nama_banjar' => $request->nama_banjar,
            'nik'     => $request->nik,
            'id_register'     => $request->id_register,
            'nama_kelian'   => $request->nama_kelian,
            'alamat'   => $request->alamat,
            'created_at'   => $request->created_at,
            'updated_at'   => $request->updated_at,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('masterbanjar')->with('success', 'Berhasil Update Data');
    }
    // end edit




    // pengajuan master agama
    public function masteragama()
    {
        //kode pengajuan
        $masterbanjar=DB::table('master_banjar')->get();
        $masteragama=DB::table('master_agama')->get();
        $getid=DB::table('master_agama')->orderBy('id', 'DESC')->take(1)->get();
        foreach ($getid as $value);
        $terakhir = $value->id;
        $idbaru = $terakhir + 1;

        $kode = 'AG'. sprintf("%04s", $idbaru);
        
        return view('master.masteragama', compact('masterbanjar', 'masteragama', 'idbaru', 'kode'));
    }

    // insert
    public function store1(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'kode_agama' => 'required',
            'agama' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);

        $agama = DB::table('master_agama')->insert([
            'id' => $request->id,
            'kode_agama' => $request->kode_agama,
            'agama'   => $request->agama,
            'created_at'   => $request->created_at,
            'updated_at'   => $request->updated_at,
        ]);

         
        if($agama){
            //redirect dengan pesan sukses
            return redirect()->route('masteragama')->with(['success' => 'Berhasil Ditambahkan!!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('masteragama')->with(['error' => 'Gagal Ditambahkan!']);
        }
    }
    // insert end


    // edit 
    public function update1(Request $request)
    {
        DB::table('master_agama')->where('id',$request->id)->update([
            'agama'   => $request->agama,
            'created_at'   => $request->created_at,
            'updated_at'   => $request->updated_at,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('masteragama')->with('success', 'Berhasil Update Data');
    }
    // end edit
    
}
