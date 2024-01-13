<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminKependudukanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $banjar=DB::table('master_banjar')->get();
        $penduduk=DB::table('register')->orderBy('id_register', 'DESC')->get();
        $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->get();
        $asli=DB::table('register')->where('masyarakat', 'asli')->get();
        
        $getno=DB::table('register')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $id_register = 'MSY'. sprintf("%04s", $nobaru);

        return view('page.tablekependudukan.penduduk', compact('penduduk','nobaru','id_register','banjar','pendatang','asli'));
    }

    public function search(Request $request)
    {
        $banjar=DB::table('master_banjar')->get();
        $penduduk=DB::table('register')->orderBy('id_register', 'DESC')->get();
        $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->get();
        $asli=DB::table('register')->where('masyarakat', 'asli')->get();
        $getno=DB::table('register')->orderBy('no', 'DESC')->take(1)->get();
        foreach ($getno as $value);
        $terakhir = $value->no;
        $nobaru = $terakhir + 1;

        $id_register = 'MSY'. sprintf("%04s", $nobaru);


        // name
        if ($request->nama)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")->get();
        }
        // id register
        if ($request->id_register)
        {
            $penduduk=DB::table('register')->where("id_register", "like", "%".$request->id_register."%")->get();
        }
        // nik
        if ($request->nik)
        {
            $penduduk=DB::table('register')->where("nik", "like", "%".$request->nik."%")->get();
        }
        // no kk
        if ($request->banjar)
        {
            $penduduk=DB::table('register')->where("banjar", "like", "%".$request->banjar."%")->get();
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("created_at", "like", "%".$created."%")->get();
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $penduduk=DB::table('register')->where("updated_at", "like", "%".$updated."%")->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id register
        if ($request->nama && $request->id_register)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->get();
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // id register and nik
        if ($request->id_register && $request->nik)
        {
            $penduduk=DB::table('register')->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // id register and no kk
        if ($request->id_register && $request->banjar)
        {
            $penduduk=DB::table('register')->where("id_register", "like", "%".$request->id_register."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // id register and created at
        if ($request->id_register && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("id_register", "like", "%".$request->id_register."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // id register and updated at
        if ($request->id_register && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("id_register", "like", "%".$request->id_register."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $penduduk=DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik & no kk & created at & updated at
        if ($request->nama && $request->id_register && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->id_register && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->id_register && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->id_register && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->id_register  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->id_register && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->id_register && $request->nik )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }

        // name & id register & no kk
        if ($request->nama && $request->id_register && $request->banjar  )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & id register & created at
        if ($request->nama && $request->id_register  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & id register & updated at
        if ($request->nama && $request->id_register && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->id_register && $request->nik && $request->banjar  )
        {
            $penduduk=DB::table('register')
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        if ( $request->id_register && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->id_register && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->id_register && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ( $request->id_register && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("id_register", "like", "%".$request->id_register."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ( $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        if ( $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('page.tablekependudukan.penduduk', compact('penduduk','nobaru','id_register','banjar','pendatang','asli'));
    }

    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////


    public function printsearch(Request $request)
    {

        $data = [
            'penduduk' => DB::table('register')->get(),
        ];


        // name
        if ($request->nama)
        {
            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")->get()
            ];
        }
        // id register
        if ($request->id_register)
        {
            $data=[
                'penduduk' => DB::table('register')->where("id_register", "like", "%".$request->id_register."%")->get()
            ];
        }
        // nik
        if ($request->nik)
        {
            $data=[
                'penduduk' => DB::table('register')->where("nik", "like", "%".$request->nik."%")->get()
            ];
        }
        // no kk
        if ($request->no_kk)
        {
            $data=[
                'penduduk' => DB::table('register')->where("no_kk", "like", "%".$request->no_kk."%")->get()
            ];
        }
        // created at
        if ($request->created_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $data=[
                'penduduk' => DB::table('register')->where("created_at", "like", "%".$created."%")->get()
            ];
        }
        // updated at
        if ($request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));
            $data=[
                'penduduk' => DB::table('register')->where("updated_at", "like", "%".$updated."%")->get()
            ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id register
        if ($request->nama && $request->id_register)
        {
            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->get()
            ];
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->get()
            ];
        }
        // name and no kk
        if ($request->nama && $request->no_kk)
        {
            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->get()
            ];
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));
            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }

        // id register and nik
        if ($request->id_register && $request->nik)
        {
            $data=[
                'penduduk' => DB::table('register')->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->get()
            ];
        }
        // id register and no kk
        if ($request->id_register && $request->no_kk)
        {
            $data=[
                'penduduk' => DB::table('register')->where("id_register", "like", "%".$request->id_register."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->get()
            ];
        }
        // id register and created at
        if ($request->id_register && $request->created_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $data=[
                'penduduk' => DB::table('register')->where("id_register", "like", "%".$request->id_register."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        // id register and updated at
        if ($request->id_register && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));
            $data=[
                'penduduk' => DB::table('register')->where("id_register", "like", "%".$request->id_register."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }

        // nik and no kk
        if ($request->nik && $request->no_kk)
        {
            $data=[
                'penduduk' => DB::table('register')->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->get()
            ];
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $data=[
                'penduduk' => DB::table('register')->where("nik", "like", "%".$request->nik."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));
            $data=[
                'penduduk' => DB::table('register')->where("nik", "like", "%".$request->nik."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }

        // no kk and created at
        if ($request->no_kk && $request->created_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $data=[
                'penduduk' => DB::table('register')->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        // no kk and updated at
        if ($request->no_kk && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));
            $data=[
                'penduduk' => DB::table('register')->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik & no kk & created at & updated at
        if ($request->nama && $request->id_register && $request->nik && $request->no_kk  && $request->created_at && $request->updated_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->id_register && $request->nik && $request->no_kk  && $request->created_at )
        {
            $created = date('m/d/Y', strtotime($request->created_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        if ($request->nama && $request->id_register && $request->nik && $request->no_kk  && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        if ($request->nama && $request->id_register && $request->nik  && $request->created_at && $request->updated_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        if ($request->nama && $request->id_register  && $request->no_kk  && $request->created_at && $request->updated_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        if ($request->nama && $request->nik && $request->no_kk  && $request->created_at && $request->updated_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        if ( $request->id_register && $request->nik && $request->no_kk  && $request->created_at && $request->updated_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->id_register && $request->nik )
        {
            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->get()
            ];
        }

        // name & id register & no kk
        if ($request->nama && $request->id_register && $request->no_kk  )
        {
            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->get()
            ];
        }
        // name & id register & created at
        if ($request->nama && $request->id_register  && $request->created_at )
        {
            $created = date('m/d/Y', strtotime($request->created_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        // name & id register & updated at
        if ($request->nama && $request->id_register && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->no_kk )
        {

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->get()
            ];
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $created = date('m/d/Y', strtotime($request->created_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        if ($request->nama  && $request->no_kk  && $request->created_at )
        {
            $created = date('m/d/Y', strtotime($request->created_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        if ($request->nama && $request->no_kk && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')->where("nama", "like", "%".$request->nama."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        if ( $request->id_register && $request->nik && $request->no_kk  )
        {
            $data=[
                'penduduk' => DB::table('register')
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->get()
            ];
        }
        if ( $request->id_register && $request->nik  && $request->created_at )
        {
            $created = date('m/d/Y', strtotime($request->created_at));

            $data=[
                'penduduk' => DB::table('register')
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        if ($request->id_register && $request->nik && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        if ($request->id_register && $request->no_kk  && $request->created_at )
        {
            $created = date('m/d/Y', strtotime($request->created_at));

            $data=[
                'penduduk' => DB::table('register')
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        if ( $request->id_register && $request->no_kk  && $request->updated_at)
        {
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')
                    ->where("id_register", "like", "%".$request->id_register."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }
        if ($request->nik && $request->no_kk  && $request->created_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));

            $data=[
                'penduduk' => DB::table('register')
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->get()
            ];
        }
        if ( $request->nik && $request->created_at && $request->updated_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')
                    ->where("nik", "like", "%".$request->nik."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }

        if ( $request->no_kk  && $request->created_at && $request->updated_at)
        {
            $created = date('m/d/Y', strtotime($request->created_at));
            $updated = date('m/d/Y', strtotime($request->updated_at));

            $data=[
                'penduduk' => DB::table('register')
                    ->where("no_kk", "like", "%".$request->no_kk."%")
                    ->where("created_at", "like", "%".$created."%")
                    ->where("updated_at", "like", "%".$updated."%")
                    ->get()
            ];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////



//        $pdf = PDF::loadView('laporan.laporanpenduduk', $data)->setOptions(['defaultFont' => 'sans-serif']);

//        return $pdf->download('laporan.pdf');
        return view('laporan.laporanpenduduk', $data);
    }


    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////



    public function store(Request $request){
        $this->validate($request, [
            'no' => 'required',
            'id_register' => 'required',
            'nik' =>'required|unique:users,nik',
            'no_kk' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'banjar' => 'required',
            'desa' => 'required',
            'kec' => 'required',
            'kab' => 'required',
            'provinsi' => 'required',
            'negara' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'tempat_lahir' => 'required',
            'status_pernikahan' => 'required',
            'value' => 'required',
            'masyarakat' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
            'tahun' => 'required',
            'keterangan' => 'nullable',
            'pendidikan' => 'nullable',
        ]);




        $penduduk = DB::table('register')->insert([
            'no' => $request->no,
            'id_register' => $request->id_register,
            'nik'     => $request->nik,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'banjar'   => $request->banjar,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'agama'   => $request->agama,
            'pekerjaan'   => $request->pekerjaan,
            'tempat_lahir'   => $request->tempat_lahir,
            'status_pernikahan'   => $request->status_pernikahan,
            'value'   => $request->value,
            'masyarakat'   => $request->masyarakat,
            'created_at'   => $request->created_at,
            'updated_at'   => $request->updated_at,
            'tahun'   => $request->tahun,
            'keterangan'   => $request->keterangan,
            'pendidikan'   => $request->pendidikan,
        ]);


        if($penduduk){
            //redirect dengan pesan sukses
            return redirect()->route('datapenduduk')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('datapenduduk')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request)
    {
        DB::table('register')->where('id_register',$request->id_register)->update([
            'nik'     => $request->nik,
            'no_kk'   => $request->no_kk,
            'nama'   => $request->nama,
            'tgl_lahir'   => $request->tgl_lahir,
            'gender'   => $request->gender,
            'alamat'   => $request->alamat,
            'banjar'   => $request->banjar,
            'desa'   => $request->desa,
            'kec'   => $request->kec,
            'kab'   => $request->kab,
            'provinsi'   => $request->provinsi,
            'negara'   => $request->negara,
            'value'   => $request->value,
            'updated_at'   => $request->updated_at,
            'keterangan'   => $request->keterangan,
            'pendidikan'   => $request->pendidikan,
        ]);


        // auth()->attempt($request->only('username', 'password'));

        return redirect()->route('datapenduduk')->with('success', 'Berhasil Di Update');
    }


}
