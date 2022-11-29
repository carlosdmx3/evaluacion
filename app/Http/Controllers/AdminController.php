<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;

use App\Http\Requests\RespuestasRequest;
use App\Http\Controllers\Controller;

use App\User;
use App\Alumno;
use App\Evaluacion;
use App\EvaluacionDocente;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $alumnodoc = DB::table('alumno_docente')
            ->select('id_user', 'onombre', 'osede', 'osubsede', 'omatricula','oprograma')
            ->where('oanio', '=', '2022' )
            ->where('oetapa', '=', '2' )
            ->where('status', '=', 'A' )
            ->OrderBy('osede', 'ASC')
            ->OrderBy('osubsede', 'ASC')
            ->OrderBy('onombre', 'ASC')
            ->groupBy('id_user', 'onombre', 'osede', 'osubsede', 'omatricula','oprograma')
            ->get();



                $totales = Alumno::select(DB::raw('count(distinct id_user) as totaldoc'), 'osede', 'osubsede', DB::raw('sum(oban_fin) as oba'))
                ->where('oanio', '=', '2022' )
                ->where('oetapa', '=', '2' )
                ->where('status', '=', 'A' )
                ->OrderBy('osede', 'ASC')
                ->groupBy('osede', 'osubsede')
                ->get();
                

                $sumaa = Alumno::select(DB::raw('count(oban_fin) as sumaa'), 'osede', 'osubsede')
                ->where('oanio', '=', '2022' )
                ->where('oetapa', '=', '2' )
                ->where('status', '=', 'A' )
                ->OrderBy('osede', 'ASC')
                ->groupBy('osede', 'osubsede')
                ->get();


                $totales2 = Alumno::select(DB::raw('count(distinct id_user) as totaldocter'), 'osede', 'osubsede')
                ->where('oanio', '=', '2022' )
                ->where('oetapa', '=', '2' )
                ->where('oban_fin', '=', '1' )
                ->where('status', '=', 'A' )
                ->OrderBy('osede', 'ASC')
                ->groupBy('osede', 'osubsede')
                ->get();

                $totalg = User::select(DB::raw('count(id) as totalg'))
                ->where('oanio', '=', '2022' )
                ->where('oetapa', '=', '2' )
                ->where('status', '=', 'A' )
                ->first();

                $totalto = User::select(DB::raw('count(oban_fin) as totalt'))
                ->where('oanio', '=', '2022' )
                ->where('oetapa', '=', '2' )
                ->where('oban_fin', '=', '1' )
                ->where('status', '=', 'A' )
                ->groupBy('oban_fin')
                ->first();

             



        return view('admin.index', ['alumnodoc'=>$alumnodoc, 
                                    'totales'=>$totales,
                                    'totales2'=>$totales2, 'sumaa'=>$sumaa,
                                    'totalg'=>$totalg,
                                    'totalto'=>$totalto,
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
                 $sedes = DB::table('alumno_docente')
        ->select('osede')
        ->where('oanio', '=', '2022' )
        ->where('oetapa', '=', '2' )
        ->where('status', '=', 'A' )
        ->OrderBy('osede', 'ASC')
        ->groupBy('osede')
        ->get();

        $alumnodoc = DB::table('alumno_docente')
        ->select('id_user', 'onombre', 'osede', 'osubsede', 'omatricula','oprograma')
        ->where('osede', '=', $request->sedes )
        ->where('oanio', '=', '2022' )
        ->where('oetapa', '=', '2' )
        ->where('status', '=', 'A' )
        ->OrderBy('osede', 'ASC')
        ->OrderBy('osubsede', 'ASC')
        ->OrderBy('onombre', 'ASC')
        ->groupBy('id_user', 'onombre', 'osede', 'osubsede', 'omatricula','oprograma')
        ->get();



        return view('admin.show', ['alumnodoc'=>$alumnodoc, 'sedes'=>$sedes ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
         $sedes = DB::table('alumno_docente')
        ->select('osede')
        ->where('oanio', '=', '2022' )
        ->where('oetapa', '=', '2' )
        ->where('status', '=', 'A' )
        ->OrderBy('osede', 'ASC')
        ->groupBy('osede')
        ->get();

        $alumnodoc = DB::table('alumno_docente')
        ->select('id_user', 'onombre', 'osede', 'osubsede', 'omatricula','oprograma')
        ->where('oanio', '=', '2022' )
        ->where('oetapa', '=', '2' )
        ->where('status', '=', 'A' )
        ->OrderBy('osede', 'ASC')
        ->OrderBy('osubsede', 'ASC')
        ->OrderBy('onombre', 'ASC')
        ->groupBy('id_user', 'onombre', 'osede', 'osubsede', 'omatricula','oprograma')
        ->get();



        return view('admin.edit', ['alumnodoc'=>$alumnodoc, 'sedes'=>$sedes ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * $2y$10$9GxM0Z6uX7LyYCHhhfwr..Tu3eUZISRdezic5M7qI09.8miAtwwlO
     */
    public function update(Request $request, $id)
    {
 


        $evaluaDoc = User::find($request->idd);
        $evaluaDoc->password  = '$2y$10$9GxM0Z6uX7LyYCHhhfwr..Tu3eUZISRdezic5M7qI09.8miAtwwlO';
        $evaluaDoc->save();

        
        return redirect()->route('admin.edit',0);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
