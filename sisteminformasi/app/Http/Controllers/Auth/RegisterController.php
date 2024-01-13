<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }


    public function index()
    {
        $getno=DB::table('users')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $kode_user = sprintf("%04s", $nobaru);
        
        return view('auth.register', compact('getno', 'nobaru', 'kode_user'));
    }

    public function store(Request $request)
    {
        
        // validation
        $this->validate($request, [
            'no'=>'required',
            'kode_user'=>'required',
            'nik'=>'required',
            'nama'=>'required',
            'username'=>'required|unique:users,username,nik,role',
            'password'=>'required',
            'role'=>'required',
            'created_at'=>'required',
            'updated_at'=>'required',
        ]);

        $register = DB::table('users')->insert([
            'no' => $request->no,
            'kode_user' => $request->kode_user,
            'id_register' => $request->id_register,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'role' => $request->role,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'password' => Hash::make($request->password),
        ]);

        // auth()->attempt($request->only('username', 'password'));

        if($register){
            //redirect dengan pesan sukses
            return redirect()->route('login')->with(['success' => 'Berhasil Register']);
        }else{
            //redirect dengan pesan error
            return redirect()->back()->with(['gagal' => 'Gagal Register']);
        }

    }
}
