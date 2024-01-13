<?php

namespace App\Http\Controllers\page\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use DB;
use Illuminate\Support\Facades\DB;

class kependudukanController extends Controller
{
    public function __construct()
     {
         $this->middleware(['auth']);
     }

    
    public function pendidikan()
    {
        $data = [
            'sd' => DB::table('register')->where('pendidikan', 'SD')
            ->get(),
            'smp' => DB::table('register')->where('pendidikan', 'SMP')
            ->get(),
            'sma' => DB::table('register')->where('pendidikan', 'SMA')
            ->get(),
            's1' => DB::table('register')->where('pendidikan', 'S1')
            ->get(),
            's2' => DB::table('register')->where('pendidikan', 'S2')
            ->get(),
            's3' => DB::table('register')->where('pendidikan', 'S3')
            ->get(),
            'penduduk' => DB::table('register')
            ->get(),
        ];

        
        return view('page.tablekependudukan.pendidikan', $data);
    } 


    public function searchPendidikan(Request $request)
    {
        $penduduk=DB::table('register')->get();
        $sd=DB::table('register')->where('pendidikan', 'SD')
        ->get();
        $smp=DB::table('register')->where('pendidikan', 'SMP')
        ->get();
        $sma=DB::table('register')->where('pendidikan', 'SMA')
        ->get();
        $s1=DB::table('register')->where('pendidikan', 'S1')
        ->get();
        $s2=DB::table('register')->where('pendidikan', 'S2')
        ->get();
        $s3=DB::table('register')->where('pendidikan', 'S3')
        ->get();

        

        // name
        if ($request->nama)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")->get();
        }
        // id register
        if ($request->pendidikan)
        {
            $penduduk=DB::table('register')->where("pendidikan", "like", "%".$request->pendidikan."%")->get();
        }
        // nik
        if ($request->nik)
        {
            $penduduk=DB::table('register')->where("nik", "like", "%".$request->nik."%")->get();
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
        if ($request->nama && $request->pendidikan)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->get();
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
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
        if ($request->pendidikan && $request->nik)
        {
            $penduduk=DB::table('register')->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }

        // id register and created at
        if ($request->pendidikan && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // id register and updated at
        if ($request->pendidikan && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("updated_at", "like", "%".$updated."%")
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

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik & no kk & created at & updated at
        if ($request->nama && $request->pendidikan && $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->pendidikan && $request->nik && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->pendidikan && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->pendidikan && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->pendidikan  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->pendidikan && $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->pendidikan && $request->nik )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }

        // name & id register & created at
        if ($request->nama && $request->pendidikan  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & id register & updated at
        if ($request->nama && $request->pendidikan && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("updated_at", "like", "%".$updated."%")
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

        if ( $request->pendidikan && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->pendidikan && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
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

        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('page.tablekependudukan.pendidikan', compact('penduduk', 'sd', 'smp', 'sma', 's1', 's2', 's3'));
    }

    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////

    public function printSearchPendidikan(Request $request)
    {
        $data = [
            'penduduk'=>DB::table('register')->get(),
        ];

        // name
        if ($request->nama)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")->get(),
                    ];
        }

        // nik
        if ($request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")->get(),
    ];
        }

             // nik
             if ($request->pendidikan)
             {
                 $data = [
                 'penduduk'=>DB::table('register')->where("pendidikan", "like", "%".$request->pendidikan."%")->get(),
         ];
             }

        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("created_at", "like", "%".$created."%")->get(),
            ];
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("updated_at", "like", "%".$updated."%")->get(),
    ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id register
        if ($request->nama && $request->pendidikan)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->get(),
                    ];
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                    ];
        }


        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
            ];
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
            ];
        }

        // id register and nik
        if ($request->peendidikan && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("peendidikan", "like", "%".$request->peendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
            ];
        }

        // id register and created at
        if ($request->pendidikan && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // id register and updated at
        if ($request->pendidikan && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }

        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik & no kk & created at & updated at
        if ($request->nama && $request->pendidikan && $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->pendidikan && $request->nik && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->pendidikan && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->pendidikan && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->pendidikan && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ( $request->pendidikan && $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->pendidikan && $request->nik )
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                    ];
        }

        // name & id register & created at
        if ($request->nama && $request->pendidikan  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // name & id register & updated at
        if ($request->nama && $request->pendidikan && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }

        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ( $request->pendidikan && $request->nik && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('register')
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                    ];
        }
        if ( $request->pendidikan && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        if ($request->pendidikan && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("pendidikan", "like", "%".$request->pendidikan."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }

        if ( $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
            ];
        }

        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('laporan.laporanpendidikan', $data);
    }

    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////


    /////pendidikan end






    //////////////////////////////////////////////////KEPENDUDUKAN START////////////////////////////////////////////////////////////
    public function index()
    {
        $penduduk=DB::table('register')->get();
        $asli=DB::table('register')->where('masyarakat', 'asli')->get();
        $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->get();
        $kelahiran=DB::table('surat_permohonan')->where('jenis_surat', 'kelahiran',)->get();
        $kematian=DB::table('surat_permohonan')->where('jenis_surat', 'kematian',)->get();

        $data = DB::table('register')->select('no_kk')->get();
        $nodouble = $data->unique('no_kk');

        return view('page.tablekependudukan.kependudukan', compact('penduduk', 'kelahiran', 'kematian', 'asli', 'pendatang', 'nodouble'));
    }


    public function searchKependudukan(Request $request)
    {
        $penduduk=DB::table('register')->get();
        $asli=DB::table('register')->where('masyarakat', 'asli')->get();
        $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->get();
        $kelahiran=DB::table('surat_permohonan')->where('jenis_surat', 'kelahiran',)->get();
        $kematian=DB::table('surat_permohonan')->where('jenis_surat', 'kematian',)->get();
        $data = DB::table('register')->select('no_kk')->get();
        $nodouble = $data->unique('no_kk');


        // name
        if ($request->nama)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")->get();
        }
        // id register
        if ($request->no_kk)
        {
            $penduduk=DB::table('register')->where("no_kk", "like", "%".$request->no_kk."%")->get();
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
        if ($request->nama && $request->no_kk)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
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
        if ($request->no_kk && $request->nik)
        {
            $penduduk=DB::table('register')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // id register and no kk
        if ($request->no_kk && $request->banjar)
        {
            $penduduk=DB::table('register')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // id register and created at
        if ($request->no_kk && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // id register and updated at
        if ($request->no_kk && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("no_kk", "like", "%".$request->no_kk."%")
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
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->no_kk && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->no_kk  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
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
        if ( $request->no_kk && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->no_kk && $request->nik )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }

        // name & id register & no kk
        if ($request->nama && $request->no_kk && $request->banjar  )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & id register & created at
        if ($request->nama && $request->no_kk  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & id register & updated at
        if ($request->nama && $request->no_kk && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
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
        if ( $request->no_kk && $request->nik && $request->banjar  )
        {
            $penduduk=DB::table('register')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        if ( $request->no_kk && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->no_kk && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->no_kk && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ( $request->no_kk && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("no_kk", "like", "%".$request->no_kk."%")
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

        return view('page.tablekependudukan.kependudukan', compact('penduduk', 'kelahiran', 'kematian', 'asli', 'pendatang', 'nodouble'));
    }



    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////


    public function printSearchKependudukan(Request $request)
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



    //////////////////////////////////////////////////KEPENDUDUKAN END////////////////////////////////////////////////////////////



    public function gender()
    {
        $penduduk=DB::table('register')->get();
        $laki=DB::table('register')->where('gender', 'Laki-laki')->get();
        $perempuan=DB::table('register')->where('gender', 'Perempuan')->get();

        return view('page.tablekependudukan.datagender', compact('penduduk', 'laki', 'perempuan'));
    }


    public function searchGender(Request $request)
    {
        $penduduk=DB::table('register')->get();
        $laki=DB::table('register')->where('gender', 'Laki-laki')->get();
        $perempuan=DB::table('register')->where('gender', 'Perempuan')->get();


        // name
        if ($request->nama)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")->get();
        }
        // id register
        if ($request->gender)
        {
            $penduduk=DB::table('register')->where("gender", "like", "%".$request->gender."%")->get();
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
        if ($request->nama && $request->gender)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
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
        if ($request->gender && $request->nik)
        {
            $penduduk=DB::table('register')->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // id register and no kk
        if ($request->gender && $request->banjar)
        {
            $penduduk=DB::table('register')->where("gender", "like", "%".$request->gender."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // id register and created at
        if ($request->gender && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("gender", "like", "%".$request->gender."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // id register and updated at
        if ($request->gender && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("gender", "like", "%".$request->gender."%")
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
        if ($request->nama && $request->gender && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->gender && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->gender && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->gender && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->gender  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
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
        if ( $request->gender && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->gender && $request->nik )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }

        // name & id register & no kk
        if ($request->nama && $request->gender && $request->banjar  )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & id register & created at
        if ($request->nama && $request->gender  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & id register & updated at
        if ($request->nama && $request->gender && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
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
        if ( $request->gender && $request->nik && $request->banjar  )
        {
            $penduduk=DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        if ( $request->gender && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->gender && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->gender && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ( $request->gender && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
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

        return view('page.tablekependudukan.datagender', compact('penduduk', 'laki', 'perempuan'));
    }

    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////

    public function printSearchGender(Request $request)
    {
        $data = [
            'penduduk'=>DB::table('register')->get(),
        ];

        // name
        if ($request->nama)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")->get(),
                    ];
        }
        // id register
        if ($request->gender)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("gender", "like", "%".$request->gender."%")->get(),
    ];
        }
        // nik
        if ($request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")->get(),
    ];
        }
        // no kk
        if ($request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("banjar", "like", "%".$request->banjar."%")->get(),
            ];
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("created_at", "like", "%".$created."%")->get(),
            ];
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("updated_at", "like", "%".$updated."%")->get(),
    ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id register
        if ($request->nama && $request->gender)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->get(),
                    ];
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                    ];
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                    ];
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
            ];
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
            ];
        }

        // id register and nik
        if ($request->gender && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
            ];
        }
        // id register and no kk
        if ($request->gender && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("gender", "like", "%".$request->gender."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                    ];
        }
        // id register and created at
        if ($request->gender && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("gender", "like", "%".$request->gender."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // id register and updated at
        if ($request->gender && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("gender", "like", "%".$request->gender."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
            ];
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
    ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik & no kk & created at & updated at
        if ($request->nama && $request->gender && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->gender && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->gender && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->gender && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->gender  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ( $request->gender && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->gender && $request->nik )
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                    ];
        }

        // name & id register & no kk
        if ($request->nama && $request->gender && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                    ];
        }
        // name & id register & created at
        if ($request->nama && $request->gender  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // name & id register & updated at
        if ($request->nama && $request->gender && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("gender", "like", "%".$request->gender."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                    ];
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ( $request->gender && $request->nik && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                    ];
        }
        if ( $request->gender && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        if ($request->gender && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->gender && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        if ( $request->gender && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("gender", "like", "%".$request->gender."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                    ];
        }
        if ( $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
            ];
        }

        if ( $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                    ];
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('laporan.laporanjeniskelamin', $data);
    }

    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////


    /////gender end

    public function agama()
    {
        $penduduk=DB::table('register')->get();
        $agama=DB::table('register')->where('agama')->get();
        $master_agama=DB::table('master_agama')->get();

        $data = DB::table('register')->select('agama')->get();
        $nodouble = $data->unique('agama');

        return view('page.tablekependudukan.dataagama', compact('penduduk', 'agama', 'master_agama', 'nodouble'));
    }


    public function searchAgama(Request $request)
    {
        $penduduk=DB::table('register')->get();
        $agama=DB::table('register')->where('agama')->get();
        $master_agama=DB::table('master_agama')->get();

        $data = DB::table('register')->select('agama')->get();
        $nodouble = $data->unique('agama');



        // name
        if ($request->nama)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")->get();
        }
        // id register
        if ($request->agama)
        {
            $penduduk=DB::table('register')->where("agama", "like", "%".$request->agama."%")->get();
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
        if ($request->nama && $request->agama)
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
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
        if ($request->agama && $request->nik)
        {
            $penduduk=DB::table('register')->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // id register and no kk
        if ($request->agama && $request->banjar)
        {
            $penduduk=DB::table('register')->where("agama", "like", "%".$request->agama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // id register and created at
        if ($request->agama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $penduduk=DB::table('register')->where("agama", "like", "%".$request->agama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // id register and updated at
        if ($request->agama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("agama", "like", "%".$request->agama."%")
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
        if ($request->nama && $request->agama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->agama && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->agama && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->agama && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->agama  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
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
        if ( $request->agama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->agama && $request->nik )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }

        // name & id register & no kk
        if ($request->nama && $request->agama && $request->banjar  )
        {
            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & id register & created at
        if ($request->nama && $request->agama  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & id register & updated at
        if ($request->nama && $request->agama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
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
        if ( $request->agama && $request->nik && $request->banjar  )
        {
            $penduduk=DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        if ( $request->agama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->agama && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->agama && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ( $request->agama && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
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

        return view('page.tablekependudukan.dataagama', compact('penduduk', 'agama', 'master_agama', 'nodouble'));
    }

    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////



    public function printSearchAgama(Request $request)
    {

        $data =[
            'penduduk'=>DB::table('register')->get(),
        ];

        // name
        if ($request->nama)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")->get(),
                ];
        }
        // id register
        if ($request->agama)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("agama", "like", "%".$request->agama."%")->get(),
                ];
        }
        // nik
        if ($request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")->get(),
                ];
        }
        // no kk
        if ($request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("banjar", "like", "%".$request->banjar."%")->get(),
            ];
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("created_at", "like", "%".$created."%")->get(),
            ];
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("updated_at", "like", "%".$updated."%")->get(),
            ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id register
        if ($request->nama && $request->agama)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->get(),
                ];
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // id register and nik
        if ($request->agama && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }
        // id register and no kk
        if ($request->agama && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("agama", "like", "%".$request->agama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // id register and created at
        if ($request->agama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("agama", "like", "%".$request->agama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // id register and updated at
        if ($request->agama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("agama", "like", "%".$request->agama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik & no kk & created at & updated at
        if ($request->nama && $request->agama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->agama && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->agama && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->agama && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->agama  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ( $request->agama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->agama && $request->nik )
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }

        // name & id register & no kk
        if ($request->nama && $request->agama && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name & id register & created at
        if ($request->nama && $request->agama  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name & id register & updated at
        if ($request->nama && $request->agama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("agama", "like", "%".$request->agama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ( $request->agama && $request->nik && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        if ( $request->agama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->agama && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->agama && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ( $request->agama && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("agama", "like", "%".$request->agama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ( $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        if ( $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('laporan.laporanagama', $data);
    }


    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////
    /////////////////////////////////////////PRINT SEARCH///////////////////////////////////////////////////////////////


    /////end agama

    public function kelahiran()
    {
        $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->get();
        $penduduk=DB::table('register')->get();

        return view('page.tablekependudukan.kelahiran', compact('penduduk', 'kelahiran'));
    }


    public function searchKelahiran(Request $request)
    {
        $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->get();
        $penduduk=DB::table('register')->get();


        // name
        if ($request->nama)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
            ->where("register.nama", "like", "%".$request->nama."%")->get();
        }
        // id surat_permohonan
        if ($request->tgl_lahir)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
            ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")->get();
        }
        // nik
        if ($request->nik)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
            ->where("surat_permohonan.nik", "like", "%".$request->nik."%")->get();
        }
        // no kk
        if ($request->banjar)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
            ->where("banjar", "like", "%".$request->banjar."%")->get();
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("created_at", "like", "%".$created."%")->get();
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("updated_at", "like", "%".$updated."%")->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id surat_permohonan
        if ($request->nama && $request->tgl_lahir)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->get();
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // id surat_permohonan and nik
        if ($request->tgl_lahir && $request->nik)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->get();
        }
        // id surat_permohonan and no kk
        if ($request->tgl_lahir && $request->banjar)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where(".register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // id surat_permohonan and created at
        if ($request->tgl_lahir && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // id surat_permohonan and updated at
        if ($request->tgl_lahir && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id surat_permohonan & nik & no kk & created at & updated at
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->tgl_lahir && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->tgl_lahir  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
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

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id surat_permohonan & nik
        if ($request->nama && $request->tgl_lahir && $request->nik )
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->get();
        }

        // name & id surat_permohonan & no kk
        if ($request->nama && $request->tgl_lahir && $request->banjar  )
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & id surat_permohonan & created at
        if ($request->nama && $request->tgl_lahir  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & id surat_permohonan & updated at
        if ($request->nama && $request->tgl_lahir && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->tgl_lahir && $request->nik && $request->banjar  )
        {
            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        if ( $request->tgl_lahir && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->tgl_lahir && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->tgl_lahir && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ( $request->tgl_lahir && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
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

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
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

            $kelahiran=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kelahiran')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('page.tablekependudukan.kelahiran', compact('penduduk', 'kelahiran'));
    }

//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
///


    public function printSearchKelahiran(Request $request)
    {

        $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->get(),
        ];


        // name
        if ($request->nama)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("register.nama", "like", "%".$request->nama."%")->get(),
                ];
        }
        // id surat_permohonan
        if ($request->tgl_lahir)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")->get(),
                ];
        }
        // nik
        if ($request->nik)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")->get(),
                ];
        }
        // no kk
        if ($request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("banjar", "like", "%".$request->banjar."%")->get(),
                ];
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("created_at", "like", "%".$created."%")->get(),
                ];
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("updated_at", "like", "%".$updated."%")->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id surat_permohonan
        if ($request->nama && $request->tgl_lahir)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->get(),
                ];
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // id surat_permohonan and nik
        if ($request->tgl_lahir && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }
        // id surat_permohonan and no kk
        if ($request->tgl_lahir && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where(".register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // id surat_permohonan and created at
        if ($request->tgl_lahir && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // id surat_permohonan and updated at
        if ($request->tgl_lahir && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id surat_permohonan & nik & no kk & created at & updated at
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->tgl_lahir && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->tgl_lahir  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ( $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id surat_permohonan & nik
        if ($request->nama && $request->tgl_lahir && $request->nik )
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }

        // name & id surat_permohonan & no kk
        if ($request->nama && $request->tgl_lahir && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name & id surat_permohonan & created at
        if ($request->nama && $request->tgl_lahir  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name & id surat_permohonan & updated at
        if ($request->nama && $request->tgl_lahir && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')->where("nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ( $request->tgl_lahir && $request->nik && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        if ( $request->tgl_lahir && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->tgl_lahir && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->tgl_lahir && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ( $request->tgl_lahir && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ( $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        if ( $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kelahiran')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('laporan.laporankelahiran', $data);
    }

///
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////

    /////end kelahiran






    public function kematian()
    {
        $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->get();
        $penduduk=DB::table('register')->get();

        return view('page.tablekependudukan.kematian', compact('penduduk', 'kematian'));
    }


    public function searchKematian(Request $request)
    {
        $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->get();
        $penduduk=DB::table('register')->get();


        // name
        if ($request->nama)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
            ->where("register.nama", "like", "%".$request->nama."%")->get();
        }
        // id surat_permohonan
        if ($request->tgl_lahir)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
            ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")->get();
        }
        // nik
        if ($request->nik)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
            ->where("surat_permohonan.nik", "like", "%".$request->nik."%")->get();
        }
        // no kk
        if ($request->banjar)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
            ->where("banjar", "like", "%".$request->banjar."%")->get();
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("created_at", "like", "%".$created."%")->get();
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("updated_at", "like", "%".$updated."%")->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id surat_permohonan
        if ($request->nama && $request->tgl_lahir)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->get();
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // id surat_permohonan and nik
        if ($request->tgl_lahir && $request->nik)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->get();
        }
        // id surat_permohonan and no kk
        if ($request->tgl_lahir && $request->banjar)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where(".register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // id surat_permohonan and created at
        if ($request->tgl_lahir && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // id surat_permohonan and updated at
        if ($request->tgl_lahir && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id surat_permohonan & nik & no kk & created at & updated at
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->tgl_lahir && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->tgl_lahir  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
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

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id surat_permohonan & nik
        if ($request->nama && $request->tgl_lahir && $request->nik )
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->get();
        }

        // name & id surat_permohonan & no kk
        if ($request->nama && $request->tgl_lahir && $request->banjar  )
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & id surat_permohonan & created at
        if ($request->nama && $request->tgl_lahir  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & id surat_permohonan & updated at
        if ($request->nama && $request->tgl_lahir && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->tgl_lahir && $request->nik && $request->banjar  )
        {
            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        if ( $request->tgl_lahir && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->tgl_lahir && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->tgl_lahir && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ( $request->tgl_lahir && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
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

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
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

            $kematian=DB::table('surat_permohonan')
        ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
        ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
        ->where('jenis_surat', 'kematian')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('page.tablekependudukan.kematian', compact('penduduk', 'kematian'));
    }


//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////




    public function printSearchKematian(Request $request)
    {

        $data = [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->get(),
        ];


        // name
        if ($request->nama)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("register.nama", "like", "%".$request->nama."%")->get(),
                ];
        }
        // id surat_permohonan
        if ($request->tgl_lahir)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")->get(),
                ];
        }
        // nik
        if ($request->nik)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")->get(),
                ];
        }
        // no kk
        if ($request->banjar)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("banjar", "like", "%".$request->banjar."%")->get(),
                ];
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("created_at", "like", "%".$created."%")->get(),
                ];
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("updated_at", "like", "%".$updated."%")->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id surat_permohonan
        if ($request->nama && $request->tgl_lahir)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->get(),
                ];
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // id surat_permohonan and nik
        if ($request->tgl_lahir && $request->nik)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }
        // id surat_permohonan and no kk
        if ($request->tgl_lahir && $request->banjar)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where(".register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // id surat_permohonan and created at
        if ($request->tgl_lahir && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // id surat_permohonan and updated at
        if ($request->tgl_lahir && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id surat_permohonan & nik & no kk & created at & updated at
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->tgl_lahir && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->tgl_lahir && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->tgl_lahir  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ( $request->tgl_lahir && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id surat_permohonan & nik
        if ($request->nama && $request->tgl_lahir && $request->nik )
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }

        // name & id surat_permohonan & no kk
        if ($request->nama && $request->tgl_lahir && $request->banjar  )
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name & id surat_permohonan & created at
        if ($request->nama && $request->tgl_lahir  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name & id surat_permohonan & updated at
        if ($request->nama && $request->tgl_lahir && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ( $request->tgl_lahir && $request->nik && $request->banjar  )
        {
            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        if ( $request->tgl_lahir && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->tgl_lahir && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->tgl_lahir && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ( $request->tgl_lahir && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("register.tgl_lahir", "like", "%".$request->tgl_lahir."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ( $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("surat_permohonan.nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        if ( $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data= [
            'penduduk'=>DB::table('surat_permohonan')
                ->join('register', 'register.id_register', '=', 'surat_permohonan.id_register')
                ->select('surat_permohonan.*', 'register.banjar', 'register.tgl_lahir', 'surat_permohonan.created_at')
                ->where('jenis_surat', 'kematian')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('laporan.laporankematian', $data);
    }



//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////

    /////end Kematian




    public function pendatang()
    {
        $penduduk=DB::table('register')->get();
        $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->get();

        return view('page.tablekependudukan.pendatang', compact('penduduk', 'pendatang'));
    }

    public function searchPendatang(Request $request)
    {
        $penduduk=DB::table('register')->get();
        $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->get();


        // name
        if ($request->nama)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")->get();
        }
        // id register
        if ($request->no_kk)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")->get();
        }
        // nik
        if ($request->nik)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("nik", "like", "%".$request->nik."%")->get();
        }
        // no kk
        if ($request->banjar)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("banjar", "like", "%".$request->banjar."%")->get();
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("created_at", "like", "%".$created."%")->get();
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("updated_at", "like", "%".$updated."%")->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id register
        if ($request->nama && $request->no_kk)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->get();
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // id register and nik
        if ($request->no_kk && $request->nik)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }
        // id register and no kk
        if ($request->no_kk && $request->banjar)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // id register and created at
        if ($request->no_kk && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // id register and updated at
        if ($request->no_kk && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik & no kk & created at & updated at
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->no_kk && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama && $request->no_kk  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
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

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->no_kk && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $penduduk=DB::table('register')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->no_kk && $request->nik )
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get();
        }

        // name & id register & no kk
        if ($request->nama && $request->no_kk && $request->banjar  )
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & id register & created at
        if ($request->nama && $request->no_kk  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & id register & updated at
        if ($request->nama && $request->no_kk && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ( $request->no_kk && $request->nik && $request->banjar  )
        {
            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get();
        }
        if ( $request->no_kk && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ($request->no_kk && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->no_kk && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get();
        }
        if ( $request->no_kk && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')
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

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')
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

            $pendatang=DB::table('register')->where('masyarakat', 'pendatang')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get();
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('page.tablekependudukan.pendatang', compact('penduduk', 'pendatang'));
    }



//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////




    public function printSearchPendatang(Request $request)
    {

        $data=[
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->get(),
        ];


        // name
        if ($request->nama)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")->get(),
                ];
        }
        // id register
        if ($request->no_kk)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")->get(),
];
        }
        // nik
        if ($request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("nik", "like", "%".$request->nik."%")->get(),
];
        }
        // no kk
        if ($request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("banjar", "like", "%".$request->banjar."%")->get(),
                ];
        }
        // created at
        if ($request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("created_at", "like", "%".$created."%")->get(),
];
        }
        // updated at
        if ($request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("updated_at", "like", "%".$updated."%")->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name and id register
        if ($request->nama && $request->no_kk)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->get(),
        ];
        }
        // name and nik
        if ($request->nama && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }
        // name and no kk
        if ($request->nama && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name and created at
        if ($request->nama && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name and updated at
        if ($request->nama && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // id register and nik
        if ($request->no_kk && $request->nik)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
                ];
        }
        // id register and no kk
        if ($request->no_kk && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // id register and created at
        if ($request->no_kk && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // id register and updated at
        if ($request->no_kk && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        // nik and no kk
        if ($request->nik && $request->banjar)
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // nik and created at
        if ($request->nik && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // nik and updated at
        if ($request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
];
        }

        // no kk and created at
        if ($request->banjar && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // no kk and updated at
        if ($request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik & no kk & created at & updated at
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
];
        }

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->no_kk && $request->nik && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->no_kk && $request->nik  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->no_kk  && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ( $request->no_kk && $request->nik && $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
        // name & id register & nik
        if ($request->nama && $request->no_kk && $request->nik )
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->get(),
        ];
        }

        // name & id register & no kk
        if ($request->nama && $request->no_kk && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name & id register & created at
        if ($request->nama && $request->no_kk  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        // name & id register & updated at
        if ($request->nama && $request->no_kk && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        // name  & nik & no kk
        if ($request->nama  && $request->nik && $request->banjar )
        {

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        // name & nik & created at
        if ($request->nama && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
        ];
        }
        // name & nik  & updated at
        if ($request->nama && $request->nik  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nama  && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->nama && $request->banjar && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')->where("register.nama", "like", "%".$request->nama."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ( $request->no_kk && $request->nik && $request->banjar  )
        {
            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->get(),
                ];
        }
        if ( $request->no_kk && $request->nik  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ($request->no_kk && $request->nik && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("nik", "like", "%".$request->nik."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->no_kk && $request->banjar  && $request->created_at )
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ( $request->no_kk && $request->banjar  && $request->updated_at)
        {
            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')
                ->where("no_kk", "like", "%".$request->no_kk."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        if ($request->nik && $request->banjar  && $request->created_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->get(),
                ];
        }
        if ( $request->nik && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')
                ->where("nik", "like", "%".$request->nik."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }

        if ( $request->banjar  && $request->created_at && $request->updated_at)
        {
            $date_created = date_create($request->created_at);
            $created = date_format($date_created,'d-m-Y');

            $date_updated = date_create($request->updated_at);
            $updated = date_format($date_updated,'d-m-Y');

            $data = [
            'penduduk'=>DB::table('register')->where('masyarakat', 'pendatang')
                ->where("banjar", "like", "%".$request->banjar."%")
                ->where("created_at", "like", "%".$created."%")
                ->where("updated_at", "like", "%".$updated."%")
                ->get(),
                ];
        }
        /////////////////////////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////////////////////////

        return view('laporan.laporanpendatang', $data);

    }




//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////


    //////////////////////////////////////////////////PENDATANG END////////////////////////////////////////////////////////////




    public function rekapsurat(Request $request)
    {
        $pengajuan=DB::table('pengajuan_surat')->where('jenis', '1')->get();
        $surat2=DB::table('surat_permohonan')->where('jenis', '2')->get();

        $surat=DB::table('master_surat')
        ->join('register', 'register.id_register', '=', 'master_surat.id_register')
        ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')
        ->get();

        return view('page.datasurat.rekapsurat', compact('surat2','pengajuan', 'surat'));
    }


    public function searchAllSurat(Request $request)
    {
        $pengajuan = DB::table('pengajuan_surat')->where('jenis', '1')->get();
        $surat2 = DB::table('surat_permohonan')->where('jenis', '2')->get();

        $surat = DB::table('master_surat')
            ->join('register', 'register.id_register', '=', 'master_surat.id_register')
            ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')
            ->get();


        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat) {
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                get();
        }


        if ($request->created_at) {
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.created_at', 'like', '%' . $request->created_at . '%')->
                get();
        }

        if ($request->nama) {
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                get();
        }

        if ($request->banjar) {
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                get();
        }

        if ($request->jenis) {
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('jenis', 'like', '%' . $request->jenis . '%')->
                get();
        }
        //////////////////////////SEARCH ONE FIELD////////////////////////////////


        //////////////////////////SEARCH CONDITION////////////////////////////////
        if ($request->kode_surat && $request->jenis) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('jenis', 'like', '%' . $request->jenis . '%')->
                get();
        }

        if ($request->kode_surat && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get();
        }

        if ($request->kode_surat && $request->nama) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                get();
        }

        if ($request->kode_surat && $request->banjar) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                get();
        }

        if ($request->kode_surat && $request->nama && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get();
        }

        if ($request->nama && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get();
        }

        if ($request->nama && $request->jenis) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('jenis', 'like', '%' . $request->jenis . '%')->
                get();
        }

        if ($request->nama && $request->banjar) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                get();
        }

        if ($request->banjar && $request->nama) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                get();
        }

        if ($request->banjar && $request->jenis) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('jenis', 'like', '%' . $request->jenis . '%')->
                get();
        }

        if ($request->banjar && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get();
        }

        if ($request->banjar && $request->nama && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get();
        }

        if ($request->banjar && $request->nama && $request->created_at && $request->jenis) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                where('jenis', 'like', '%' . $request->jenis . '%')->
                get();
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////


        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar && $request->jenis) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $surat = DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                where('jenis', 'like', '%' . $request->jenis . '%')->
                get();
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////


        return view('page.datasurat.rekapsurat', compact('surat2', 'pengajuan', 'surat'));

    }

    

//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////



    public function printSearchRekapSurat(Request $request)
    {
        $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')
                ->get(),
        ];



        //////////////////////////SEARCH ONE FIELD////////////////////////////////
        if ($request->kode_surat) {
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                get(),
                ];
        }


        if ($request->created_at) {
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.created_at', 'like', '%' . $request->created_at . '%')->
                get(),
                ];
        }

        if ($request->nama) {
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                get(),
            ];
        }

        if ($request->banjar) {
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                get(),
            ];
        }

        //////////////////////////SEARCH ONE FIELD////////////////////////////////


        //////////////////////////SEARCH CONDITION////////////////////////////////

        if ($request->kode_surat && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get(),
            ];
        }

        if ($request->kode_surat && $request->nama) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                get(),
                ];
        }

        if ($request->kode_surat && $request->banjar) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                get(),
                ];
        }

        if ($request->kode_surat && $request->nama && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get(),
        ];
        }

        if ($request->nama && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get(),
 ];
        }

        if ($request->nama && $request->banjar) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                get(),
        ];
        }

        if ($request->banjar && $request->nama) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                get(),
                ];
        }

        if ($request->banjar && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get(),
        ];
        }

        if ($request->banjar && $request->nama && $request->created_at) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get(),
                ];
        }

        //////////////////////////SEARCH CONDITION////////////////////////////////


        //////////////////////////SEARCH ALLL FIELD////////////////////////////////

        if ($request->kode_surat && $request->created_at && $request->nama && $request->banjar) {
            $date = date_create($request->created_at);
            $created = date_format($date, 'Y-m-d');
            $data = [
            'penduduk' => DB::table('master_surat')
                ->join('register', 'register.id_register', '=', 'master_surat.id_register')
                ->select('master_surat.*', 'register.banjar', 'master_surat.created_at')->
                where('kode_surat', 'like', '%' . $request->kode_surat . '%')->
                where('register.banjar', 'like', '%' . $request->banjar . '%')->
                where('master_surat.nama', 'like', '%' . $request->nama . '%')->
                where('master_surat.created_at', 'like', '%' . $created . '%')->
                get(),
        ];
        }
        //////////////////////////SEARCH ALLL FIELD////////////////////////////////


        return view('laporan.laporansurat', $data);


    }



//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////
//////////////////////////////////////////// PRINT SEARCH/////////////////////////////////////////////////////////




}
