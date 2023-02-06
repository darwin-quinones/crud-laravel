<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Models\Empleado;

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

// example of how to access routes
// Route::get('/empleado', function () {
//     return view('empleado.index');
// });

/**
 * access to create routes
 */

//  Route::get('/empleado/create', [EmpleadoController::class, 'create']);

 /**
  * access to all empleados routes
  note : middleware('auth') forces user authentication
  */
  Route::resource('empleado', EmpleadoController::class)->middleware('auth');

Auth::routes(['reset' => false, 'register' => false]);

// cambiar ela redireccion de las vistas


Route::get('/home', [EmpleadoController::class, 'index'])->middleware('auth')->name('home');
Route::group(['middlewere' => 'auth'], function(){
    Route::get('/', [EmpleadoController::class, 'index'])->middleware('auth')->name('home');
});
