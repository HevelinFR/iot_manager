<?php


use App\Http\Controllers\AmbientesController;
use App\Http\Controllers\DispositivosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Painel;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('painel.login');
});

Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');


//Ambientes
Route::get('/ambientes', [AmbientesController::class, 'index'])->middleware('auth')->name('ambientes.index');
Route::post('/adicionar-ambiente', [AmbientesController::class, 'store'])->middleware('admin')->name('ambientes.store');
Route::get('/ambiente/edit/{id}', [AmbientesController::class, 'edit'])->middleware('admin')->name('ambientes.edit');
Route::put('/ambiente/update/{id}', [AmbientesController::class, 'update'])->middleware('admin')->name('ambientes.update');;
Route::delete('/ambiente/{id}', [AmbientesController::class, 'destroy'])->middleware('admin');
Route::get('/ambiente/edit', function(){
    return view('painel.ambiente.edit');
})->middleware('admin');

//Dispositivos
Route::get('/dispositivos', [DispositivosController::class, 'index'])->middleware('auth')->name('dispositivos.index');
Route::post('/adicionar-dispositivo', [DispositivosController::class, 'store'])->middleware('admin')->name('dispositivo.store');
Route::get('/dispositivo/edit/{id}', [DispositivosController::class, 'edit'])->middleware('admin')->name('dispositivos.edit');
Route::put('/dispositivo/update/{id}', [DispositivosController::class, 'update'])->middleware('admin')->name('dispositivo.update');;
Route::delete('/ambiente/{id}', [DispositivosController::class, 'destroy'])->middleware('admin');

Route::get('/dispositivo/edit',  [DispositivosController::class, 'redir_registration'])->middleware('auth')->name('cadastro_dispositivos');

Route::get('envio-email', function(){
  
});

require __DIR__.'/auth.php';