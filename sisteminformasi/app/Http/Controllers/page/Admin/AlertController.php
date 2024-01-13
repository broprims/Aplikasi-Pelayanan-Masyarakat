<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlertController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    // edit 

    //startalertdashboard
    public function alertdashboard(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'alert' => $request->alert,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('dashboard');
    }

    //masyarakat
    public function alertdashboard1(Request $request)
    {
        DB::table('surat_permohonan')->where('id_surat',$request->id_surat)->update([
            'alert' => $request->alert,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('dashboard');
    }

    public function alertdashboard2(Request $request)
    {
        DB::table('pengajuan_surat')->where('id',$request->id)->update([
            'alert1' => $request->alert1,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('dashboard');
    }
    //endalertdashboard


    /////////


    //alert all
    public function alert(Request $request)
    {
        DB::table('pengajuan_surat')->where('jenis',$request->jenis)->update([
            'alert' => $request->alert,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('alertadminread');
    }

    public function alert1(Request $request)
    {
        DB::table('pengajuan_surat')->where('jenis',$request->jenis)->update([
            'alert1' => $request->alert1,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('alertadminread');
    }

    ///masyarakat
    public function alert2(Request $request)
    {
        DB::table('surat_permohonan')->where('jenis',$request->jenis)->update([
            'alert' => $request->alert,
        ]);

        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('alertread');
    }
    // end alert





    ///tampilan alert
    public function index(Request $request)
    {
        $data = [
            // 'pesan' => DB::table('surat_permohonan')->where('jenis', '2')->where('alert', '1')->get(),
            // 'pesan1' => DB::table('surat_permohonan')->where('jenis', '2')->where('alert1', '1')->get(),
            'pesan2' => DB::table('surat_permohonan')->where('jenis', '2')->where('alert', '1')->orderBy('id_surat', 'DESC')->where('id_register', auth()->user()->id_register)->get(),

            // 'read' => DB::table('surat_permohonan')->where('jenis', '2')->where('alert', '0')->get(),
            // 'read1' => DB::table('surat_permohonan')->where('jenis', '2')->where('alert1', '0')->get(),
            'read2' => DB::table('surat_permohonan')->where('jenis', '2')->where('alert', '0')->orderBy('id_surat', 'DESC')->where('id_register', auth()->user()->id_register)->get(),
        ];

        return view('alert.alert', $data);
    }

    public function alertread(Request $request)
    {
        $data = [
            'pesan2' => DB::table('surat_permohonan')->where('jenis', '2')->where('alert', '1')->orderBy('id_surat', 'DESC')->where('id_register', auth()->user()->id_register)->get(),
            'read2' => DB::table('surat_permohonan')->where('jenis', '2')->where('alert', '0')->orderBy('id_surat', 'DESC')->where('id_register', auth()->user()->id_register)->get(),
        ];

        return view('alert.alertread', $data);
    }


    public function alertadmin(Request $request)
    {
        $data = [
            'pesan' => DB::table('pengajuan_surat')->where('alert', '1')->orderBy('id', 'DESC')->get(),
            'pesan1' => DB::table('pengajuan_surat')->where('alert1', '1')->orderBy('id', 'DESC')->get(),

            'cetak' => DB::table('surat_permohonan')->where('jenis', '2')->get(),

            'read' => DB::table('pengajuan_surat')->where('alert', '0')->orderBy('id', 'DESC')->get(),
            'read1' => DB::table('pengajuan_surat')->where('alert1', '0')->orderBy('id', 'DESC')->get(),

        ];

        return view('alert.alertadmin', $data);
    }

    public function alertadminread(Request $request)
    {
        $data = [
            'pesan' => DB::table('pengajuan_surat')->where('alert', '1')->orderBy('id', 'DESC')->get(),
            'pesan1' => DB::table('pengajuan_surat')->where('alert1', '1')->orderBy('id', 'DESC')->get(),


            'read' => DB::table('pengajuan_surat')->where('alert', '0')->orderBy('id', 'DESC')->get(),
            'read1' => DB::table('pengajuan_surat')->where('alert1', '0')->orderBy('id', 'DESC')->get(),
        ];

        return view('alert.alertadminread', $data);
    }
}
