<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\RespuestasRequest;

use App\Evaluacion;
use App\EvaluacionDocente;
use App\Alumno;
use App\User;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
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
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluacion = DB::table('evaluacion')
        ->select('id', 'odescripcion', 'oseccion', 'onumpregunta')
        ->where('oanio', '=', '2022' )
        ->where('oetapa', '=', '1' )
        ->where('status', '=', 'A' )
        ->OrderBy('onumpregunta', 'ASC')
        ->get();

        $alumno = Alumno::find(auth()->user()->id);

        $docenteval = DB::table('docente_eval')
        ->select('id','id_alumno_usr','id_docente','op1','op2','op3','op4','op5','op6','op7','op8','op9','op10','op11','op12','op13','op14','op15',
                 'op16','op17','op18','op19','op20','op21','op22','op23','op24','op25','op26','op27','op28','op29','op30','op31','op32','op33','op34','op35')
        ->where('id_alumno_usr', '=', auth()->user()->id )
        ->where('id_docente','=',$id)
        ->where('status', '=', 'A' )
        ->first();



        return view('pages.evaluaciones.index')->with(['evaluacion' => $evaluacion ,'docenteval' => $docenteval,'alumno' => $alumno, ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RespuestasRequest $request, $id)
    {
        $evaluar = EvaluacionDocente::find($id);
        $evaluar->op1 = $request->p1;
        $evaluar->op2 = $request->p2;
        $evaluar->op3 = $request->p3;
        $evaluar->op4 = $request->p4;
        $evaluar->op5 = $request->p5;
        $evaluar->op6 = $request->p6;
        $evaluar->op7 = $request->p7;
        $evaluar->op8 = $request->p8;
        $evaluar->op9 = $request->p9;
        $evaluar->op10 = $request->p10;
        $evaluar->op11 = $request->p11;
        $evaluar->op12 = $request->p12;
        $evaluar->op13 = $request->p13;
        $evaluar->op14 = $request->p14;
        $evaluar->op15 = $request->p15;
        $evaluar->op16 = $request->p16;
        $evaluar->op17 = $request->p17;
        $evaluar->op18 = $request->p18;
        $evaluar->op19 = $request->p19;
        $evaluar->op20 = $request->p20;
        $evaluar->op21 = $request->p21;
        $evaluar->op22 = $request->p22;
        $evaluar->op23 = $request->p23;
        $evaluar->op24 = $request->p24;
        $evaluar->op25 = $request->p25;
        $evaluar->op26 = $request->p26;
        $evaluar->op27 = $request->p27;
        $evaluar->op28 = $request->p28;
        $evaluar->op29 = $request->p29;
        $evaluar->op30 = $request->p30;
        $evaluar->op31 = $request->p31;
        $evaluar->op32 = $request->p32;
        $evaluar->op33 = $request->p33;
        $evaluar->op34 = $request->p34;
        $evaluar->op35 = $request->p35;
        $evaluar->oban_fin  = 1;
        $evaluar->save();

        $users = DB::table('docente_eval')
        ->select('id', 'id_alumno_usr', 'id_docente')
        ->where('id', '=', $id )
        ->where('status', '=', 'A' )
        ->first();
        

        $evaluaDoc = Alumno::find($users->id_docente);
        $evaluaDoc->oban_fin  = 1;
        $evaluaDoc->save();

        $evaluaDoc = User::find( auth()->user()->id  );
        $evaluaDoc->oban_fin  = 1;
        $evaluaDoc->save();

       

        return redirect()->route('pages.docentes.index');
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
