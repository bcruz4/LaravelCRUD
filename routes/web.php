<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

Route::get('/', function () {
    return view('auth.login');
});

/*
Route::get('/empleado', function () {
    return view('empleado.index');
});


Route::get('empleado/create',[EmpleadoController::class, 'create']);
*/

//  Accede a todas las URL de los metod en empleadoController
// agregamos ->middleware('auth'); para que el usurio no pueda entrar a esa seccion si no esta logeado
Route::resource('empleado', EmpleadoController::class)->middleware('auth');

// eliminamos las funciones de nuevo registro y resetear la contrasnia
Auth::routes(['register'=>false,'reset'=>false]);


Route::get('/home', [EmpleadoController::class, 'index'])->name('home');


Route::group(['middleware'=>'auth'] ,function () {
    // cuando el usuario se loguue se vaya a empleadoscontroller a index
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});