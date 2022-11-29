<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
Use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::select('*')
        ->where('id', '=', auth()->user()->id)
        ->get();

        return view('index', ['users' => $users]);
    }

    public function index_()
    {
        return view('pages.index');
    }

    public function index2()
    {
        return view('pages.docentes.index');
    }


}
