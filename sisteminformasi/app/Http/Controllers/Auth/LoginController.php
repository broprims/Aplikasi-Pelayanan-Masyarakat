<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {

        return view('auth.authpage');
    }

    public function store(Request $request)
    {
        // $username = DB::table('users')->select('username')->where('username', $request->username)->first();
        $level = DB::table('users')->join('tb_level', 'users.role', '=', 'tb_level.level')->select('users.role')->orderBy('users.kode_user','DESC')->where('username', $request->username)->first();

        $this->validate($request, [
            'username'=>'required',
            'password'=>'required',
        ]);


        if (!auth()->attempt($request->only('username', 'password'), $request->remember)){
            return back()->with('gagal', 'invalid login details');
        }

        if($level->role == 'admin') {
            return redirect()->route('dashboard')->with('login','Anda Berhasil Login');
        }
        elseif($level->role == 'pegawai') {
            return redirect()->route('dashboard')->with('login','Anda Berhasil Login');
        }
        elseif($level->role == 'masyarakat') {
            return redirect()->route('dashboard')->with('login','Anda Berhasil Login');
        }
    }

}

