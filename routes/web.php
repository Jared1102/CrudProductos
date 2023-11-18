<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MuroController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RegistroController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('main');

//Route::get('/productos',function(){
//    return view('productos.index');
//})->name('productos');

Route::get('/productos',[ProductosController::class,'index'])->name('productos');
Route::get('/productos/create',[ProductosController::class,'create'])->name('productosCreate');
Route::post('/productos',[ProductosController::class,'store'])->name('productosStore');
Route::get('/productos/{producto}/edit',[ProductosController::class,'edit'])->name('ProductosEdit');
Route::patch('/productos/{producto}',[ProductosController::class,'update'])->name('ProductosUpdate');
Route::delete('/productos/{producto}',[ProductosController::class,'destroy'])->name('ProductosDestroy');

//Auth
Route::get('/registro',[RegistroController::class,'index'])->name('RegistroIndex');
Route::post('/registros',[RegistroController::class,'store'])->name('RegistroStore');

Route::get('/muro',[MuroController::class,'index'])->name('MuroIndex');
Route::get('/login',[LoginController::class,'index'])->name('LoginIndex');
Route::post('/login',[LoginController::class,'store'])->name('LoginStore');
Route::post('/logout',[LogoutController::class,'store'])->name('LogoutStore');
