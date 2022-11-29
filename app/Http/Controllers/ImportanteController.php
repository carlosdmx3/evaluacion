<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\RespuestasRequest;
use App\Http\Controllers\Controller;

use App\Alumno;
use App\Evaluacion;
use App\EvaluacionDocente;

class ImportanteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $users = DB::table('users')
        ->select('id', 'name', 'omatricula', 'ofolio', 'oanio', 'oetapa')
        ->where('id', '=', auth()->user()->id )
        ->where('status', '=', 'A' )
        ->first();
    
    $alumno = DB::table('alumno_docente')
        ->select('id', 'id_user', 'omatricula', 'ofolio', 'odocente', 'oasignatura')
        ->where('omatricula', '=', auth()->user()->omatricula )
        ->where('ofolio', '=', auth()->user()->ofolio )
        ->where('status', '=', 'A' )
        ->OrderBy('odocente', 'ASC')
        ->OrderBy('oasignatura', 'ASC')
        ->GroupBy('id', 'omatricula', 'ofolio','odocente', 'oasignatura')
        ->get();

    $docenteval = DB::table('docente_eval')
        ->select('id','id_alumno_usr','id_docente','oban_fin','op1','op2','op3','op4','op5','op6','op7','op8','op9','op10','op11','op12','op13','op14','op15','op16','op17','op18','op19','op20','op21','op22','op23','op24','op25','op26','op27','op28','op29','op30','op31','op32','op33','op34','op35')
        ->where('id_alumno_usr', auth()->user()->id )
        ->where('status', '=', 'A' )
        ->OrderBy('id_alumno_usr', 'ASC')
        ->OrderBy('id_docente', 'ASC')
        ->get();


        $alumnod = DB::table('alumno_docente')
        ->select('id_user','onombre','osede','osubsede','omatricula','ofolio','oprograma')
        ->where('id_user', '=', auth()->user()->id)
        ->where('status', '=', 'A' )
        ->groupBy('id_user','onombre','osede','osubsede','omatricula','ofolio','oprograma')
        ->get();

        $docentevalc = DB::table('docente_eval')
        ->select(DB::raw('count(*) as total, id_alumno_usr'))
        ->where('id_alumno_usr','=',auth()->user()->id)
        ->where('status', '=', 'A' )
        ->groupBy('id_alumno_usr')
        ->first();

    $docenteval2 = DB::table('docente_eval')
        ->select(DB::raw('count(*) as totalC, oban_fin'))
        ->where('id_alumno_usr','=',auth()->user()->id)
        ->where('oban_fin','=',1)
        ->where('status', '=', 'A' )
        ->groupBy('oban_fin')
        ->first();

        $documento = DB::table('comprobante')
        ->select('*')
        ->first();
        
        return view('importante.index', ['alumno' => $alumno ,'users' => $users, 'docenteval' => $docenteval, 'alumnod'=>$alumnod,'docentevalc' => $docentevalc,'docenteval2' => $docenteval2, 'documento'=>$documento ]);
    }
}
