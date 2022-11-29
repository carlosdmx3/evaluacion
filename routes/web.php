<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;

use App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Cntrollers\AdminController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\EvaluacionDocenteController;

use App\Http\Controllers\AvisosController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\ImportanteController;
use App\Http\Controllers\PerfilController;


Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/', function () {
    return view('welcome');
})->where('any', '.*');
*/
Auth::routes();
   
/*
Route::resource('/pages', 'HomeController');
*/
Route::get('evaluacion', [HomeController::class, 'index'])->name('index')->middleware('auth');
Route::get('pages', [HomeController::class, 'index_'])->name('pages.index')->middleware('auth');

Route::get('/change-password', [UserController::class, 'index'])->name('change-password');
Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update-password');

Route::resource('docentes', 'AlumnoController')
        ->parameters(['alunno' => 'alunno', 'evaluacion' => 'evaluacion','docenteval' => 'docenteval'])
        ->names('pages.docentes')->middleware('auth');


Route::resource('evaluaciones', 'EvaluacionController')
        ->parameters(['evaluacion' => 'evaluacion'])
        ->names('pages.evaluaciones')->middleware('auth');


Route::resource('admin', 'AdminController')
        ->parameters(['alunno' => 'alunno', 'evaluacion' => 'evaluacion','docenteval' => 'docenteval'])
        ->names('admin');
        

Route::get('instrucciones', [InformacionController::class, 'index'])->name('informacion.index')->middleware('auth');
Route::get('importante', [ImportanteController::class, 'index'])->name('importante.index')->middleware('auth');

