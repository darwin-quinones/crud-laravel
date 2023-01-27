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
    return view('welcome');
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
  */

  Route::resource('empleado', EmpleadoController::class);
