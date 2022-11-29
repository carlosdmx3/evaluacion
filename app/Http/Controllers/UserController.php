<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
Use App\User;
Use App\Alumno;

class UserController extends Controller
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

    public function changePassword()
    {
        
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);


            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "El password anterior no coincide");
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("status", "El password fue cambiado correctamente");
    }


    public function index()
    {

        $users = User::select('*')
            ->where('id', '=', auth()->user()->id)
            ->where('status', '=', 'A' )
            ->first();

        $alumnod = DB::table('alumno_docente')
            ->select('id_user','onombre','osede','osubsede','omatricula','ofolio','oprograma')
            ->where('id_user', '=', auth()->user()->id)
            ->where('status', '=', 'A' )
            ->groupBy('id_user','onombre','osede','osubsede','omatricula','ofolio','oprograma')
            ->get();


        $docenteval = DB::table('docente_eval')
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


        return view('change-password')->with(['users' => $users, 'docenteval'=> $docenteval, 'docenteval2'=> $docenteval2, 'alumnod'=>$alumnod]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
