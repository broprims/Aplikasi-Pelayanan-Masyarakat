<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $alldata=DB::table('users')
        ->join('register', 'register.nik', '=', 'users.nik')
        ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
        'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
        ->get();

        $nik=DB::table('register')->get();

        return view('page.tablepage.tableuser',compact('alldata','nik'));
    }

    
    public function searchUser(Request $request)
    {
        $alldata=DB::table('users')
        ->join('register', 'register.nik', '=', 'users.nik')
        ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
        'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
        ->get();

        $nik=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_user )
        {
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->get();
        }


        if ($request->created_at)
        {
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->get();
        }

        if ($request->updated_at)
        {
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama)
        {
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->username)
        {
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('username', 'like', '%'.$request->username.'%')->
            get();
        }

        if ($request->role)
        {
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('role', 'like', '%'.$request->role.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////


        //////////////////////////SEARCH CONDITION 1////////////////////////////////
        if ($request->kode_user && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 'users.nama', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_user && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }

        if ($request->kode_user && $request->role)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->get();
        }

        if ($request->kode_user && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->kode_user && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->kode_user && $request->username && $request->role  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->kode_user && $request->role  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->kode_user && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 1 ////////////////////////////////////



        //////////////////////////////////// CONDITION 2 ////////////////////////////////////
        if ($request->nama && $request->username && $request->role  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->get();
        }

        if ($request->nama && $request->role)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->role && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->role && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->role && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->role)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->get();
        }

        if ($request->username && $request->role)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->role  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 2 ////////////////////////////////////


        //////////////////////////SEARCH CONDITION 3////////////////////////////////
        if ($request->username && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 'users.nama', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->username && $request->role)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->get();
        }

        if ($request->username && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('username', 'like', '%'.$request->username.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('username', 'like', '%'.$request->username.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->username && $request->role  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->username && $request->role  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        //////////////////////////////////// CONDITION 3 ////////////////////////////////////

        //////////////////////////SEARCH CONDITION 4////////////////////////////////
        if ($request->role && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 'users.nama', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->role && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }

        if ($request->role && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('role', 'like', '%'.$request->role.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->role && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('role', 'like', '%'.$request->role.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->role && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->role && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->role && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 4 ////////////////////////////////////

        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_user && $request->nama && $request->username && $request->role  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $alldata=DB::table('users')
            ->join('register', 'register.nik', '=', 'users.nik')
            ->select('users.*','register.nik', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.tablepage.tableuser',compact('alldata','nik')); 
    }

    /////////////////////////////////////////////////USERS//////////////////////////////////////////////////





    /////////////////////////////////////////////////MASYARAKAT//////////////////////////////////////////////////
    
    public function masyarakat()
    {
        $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
        ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
        'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
	    ->where('role', 'masyarakat')->get();

        $getno=DB::table('users')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $kode_user = sprintf("%04s", $nobaru);

        $nik=DB::table('register')->get();

        return view('page.tablepage.tablemasyarakat',compact('masyarakat', 'nik', 'nobaru', 'kode_user'));
    }


    public function searchMasyarakat(Request $request)
    {
        $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
        ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
        'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
	    ->where('role', 'masyarakat')->get();

        $getno=DB::table('users')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $kode_user = sprintf("%04s", $nobaru);

        $nik=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_user )
        {
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->get();
        }


        if ($request->created_at)
        {
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->get();
        }

        if ($request->updated_at)
        {
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama)
        {
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->username)
        {
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('username', 'like', '%'.$request->username.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////


        //////////////////////////SEARCH CONDITION 1////////////////////////////////
        if ($request->kode_user && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_user && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }


        if ($request->kode_user && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->kode_user && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->kode_user && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->kode_user && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->kode_user && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 1 ////////////////////////////////////



        //////////////////////////////////// CONDITION 2 ////////////////////////////////////
        if ($request->nama && $request->username  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }



        if ($request->nama && $request->username && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }


        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 2 ////////////////////////////////////


        //////////////////////////SEARCH CONDITION 3////////////////////////////////
        if ($request->username && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->username && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('username', 'like', '%'.$request->username.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('username', 'like', '%'.$request->username.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        //////////////////////////////////// CONDITION 3 ////////////////////////////////////


        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_user && $request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $masyarakat=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'masyarakat')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.tablepage.tablemasyarakat',compact('masyarakat', 'nik', 'nobaru', 'kode_user'));
    }
    

    /////////////////////////////////////////////////MASYARAKAT//////////////////////////////////////////////////






    /////////////////////////////////////////////////PEGAWAI//////////////////////////////////////////////////

    public function pegawai()
    {
        $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
        ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
        'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
	    ->where('role', 'pegawai')->get();

        $getno=DB::table('users')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $kode_user = sprintf("%04s", $nobaru);

        $nik=DB::table('register')->get();

        return view('page.tablepage.tablepegawai', compact('pegawai', 'nik', 'nobaru', 'kode_user'));
    }



    public function searchPegawai(Request $request)
    {
        $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
        ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
        'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
	    ->where('role', 'pegawai')->get();

        $getno=DB::table('users')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $kode_user = sprintf("%04s", $nobaru);

        $nik=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_user )
        {
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->get();
        }


        if ($request->created_at)
        {
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->get();
        }

        if ($request->updated_at)
        {
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama)
        {
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->username)
        {
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('username', 'like', '%'.$request->username.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////


        //////////////////////////SEARCH CONDITION 1////////////////////////////////
        if ($request->kode_user && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_user && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }


        if ($request->kode_user && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->kode_user && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->kode_user && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->kode_user && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->kode_user && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 1 ////////////////////////////////////



        //////////////////////////////////// CONDITION 2 ////////////////////////////////////
        if ($request->nama && $request->username  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }



        if ($request->nama && $request->username && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }


        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 2 ////////////////////////////////////


        //////////////////////////SEARCH CONDITION 3////////////////////////////////
        if ($request->username && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->username && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('username', 'like', '%'.$request->username.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('username', 'like', '%'.$request->username.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        //////////////////////////////////// CONDITION 3 ////////////////////////////////////


        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_user && $request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $pegawai=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'pegawai')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.tablepage.tablepegawai',compact('pegawai', 'nik', 'nobaru', 'kode_user'));
    }
    
    

    /////////////////////////////////////////////////PEGAWAI//////////////////////////////////////////////////













    /////////////////////////////////////////////////ADMIN//////////////////////////////////////////////////

    public function admin()
    {
        $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
        ->select('users.*', 'register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
        'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan','users.created_at','users.updated_at')
	    ->where('role', 'admin')->get();

        $getno=DB::table('users')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $kode_user = sprintf("%04s", $nobaru);

        $nik=DB::table('register')->get();

        return view('page.tablepage.tableadmin',compact('admin', 'nik', 'nobaru', 'kode_user'));
    }


    public function searchAdmin(Request $request)
    {
        $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
        ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
        'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
	    ->where('role', 'admin')->get();

        $getno=DB::table('users')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $kode_user = sprintf("%04s", $nobaru);

        $nik=DB::table('register')->get();
        

        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_user )
        {
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->get();
        }


        if ($request->created_at)
        {
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->get();
        }

        if ($request->updated_at)
        {
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama)
        {
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->username)
        {
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('username', 'like', '%'.$request->username.'%')->
            get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////




        //////////////////////////SEARCH CONDITION////////////////////////////////


        //////////////////////////SEARCH CONDITION 1////////////////////////////////
        if ($request->kode_user && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->kode_user && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }


        if ($request->kode_user && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->kode_user && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->kode_user && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->kode_user && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('role', 'like', '%'.$request->role.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->kode_user && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 1 ////////////////////////////////////



        //////////////////////////////////// CONDITION 2 ////////////////////////////////////
        if ($request->nama && $request->username  && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }



        if ($request->nama && $request->username && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$request->created_at.'%')
            ->where('users.updated_at', 'like', '%'.$request->updated_at.'%')
            ->get();
        }

        if ($request->nama && $request->username)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->get();
        }


        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->nama && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->get();
        }
        //////////////////////////////////// CONDITION 2 ////////////////////////////////////


        //////////////////////////SEARCH CONDITION 3////////////////////////////////
        if ($request->username && $request->nama)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')->
            get();
        }

        if ($request->username && $request->created_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('username', 'like', '%'.$request->username.'%')->
            where('users.created_at', 'like', '%'.$created.'%')->
            get();
        }


        if ($request->username && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('username', 'like', '%'.$request->username.'%')->
            where('users.updated_at', 'like', '%'.$updated.'%')->
            get();
        }

        if ($request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        if ($request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }

        //////////////////////////////////// CONDITION 3 ////////////////////////////////////


        //////////////////////////SEARCH CONDITION////////////////////////////////



        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_user && $request->nama && $request->username && $request->created_at && $request->updated_at)
        {
            $date = date_create($request->created_at);
            $created = date_format($date,'Y-m-d');
            $date = date_create($request->updated_at);
            $updated = date_format($date,'Y-m-d');
            $admin=DB::table('register')->join('users', 'users.nik', '=', 'register.nik')
            ->select('users.*','register.nik', 'register.nama', 'register.gender', 'register.alamat', 'register.banjar', 'register.kec', 
            'register.desa', 'register.kec', 'register.kab', 'register.provinsi', 'register.negara', 'register.status_pernikahan', 'register.keterangan', 'users.created_at','users.updated_at')
            ->where('role', 'admin')
            ->where('kode_user', 'like', '%'.$request->kode_user.'%')
            ->where('users.nama', 'like', '%'.$request->nama.'%')
            ->where('username', 'like', '%'.$request->username.'%')
            ->where('users.created_at', 'like', '%'.$created.'%')
            ->where('users.updated_at', 'like', '%'.$updated.'%')
            ->get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////




        return view('page.tablepage.tableadmin',compact('admin', 'nik', 'nobaru', 'kode_user'));
    }


    /////////////////////////////////////////////////ADMIN//////////////////////////////////////////////////













    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'no'=>'required',
            'kode_user'=>'required',
            'nik'=>'required',
            'nama'=>'required',
            'username'=>'required',
            'password'=>'required',
            'role'=>'required',
            'created_at'=>'required',
            'updated_at'=>'required',
        ]);

        DB::table('users')->insert([
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

        return redirect()->route('tableuser')->with('success', 'Berhasil Di Tambahkan');

    }

    


    public function update(Request $request)
    {
        DB::table('users')->where('kode_user',$request->kode_user)->update([
            'kode_user' => $request->kode_user,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'role' => $request->role,
            'updated_at' => $request->updated_at,
        ]);

        DB::table('register')->where('nik',$request->nik)->update([
            'nama' => $request->nama,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('tableuser')->with('success', 'Berhasil Di Update');
    }


    public function updatepassword(Request $request)
    {
        DB::table('users')->where('kode_user',$request->kode_user)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('register')->where('nik',$request->nik)->update([
            'nama' => $request->nama,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('tableuser')->with('success', 'Berhasil Di Update');
    }


    //users
    public function destroy(Request $request,$kode_user)
    {
        DB::table('users')->where('kode_user', $kode_user)->delete();
        return redirect()->route('tableuser')->with('success','User Berhasil di Hapus !!!');
    }

    //masyarakat
    public function destroy1(Request $request,$kode_user)
    {
        DB::table('users')->where('kode_user', $kode_user)->delete();
        return redirect()->route('tablemasyarakat')->with('success','User Berhasil di Hapus !!!');
    }

    //petugas
    public function destroy2(Request $request,$kode_user)
    {
        DB::table('users')->where('kode_user', $kode_user)->delete();
        return redirect()->route('tablepegawai')->with('success','User Berhasil di Hapus !!!');
    }

    //admin
    public function destroy3(Request $request,$kode_user)
    {
        DB::table('users')->where('kode_user', $kode_user)->delete();
        return redirect()->route('tableadmin')->with('success','User Berhasil di Hapus !!!');
    }
}


