<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\conductorController;
use App\Http\Controllers\vehiculoController;
use App\Http\Controllers\baseController;
use App\Http\Controllers\propietarioController;
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

//INICIO
Route::get('/',[baseController::class, 'inicio'] );
Route::get('/home',[baseController::class, 'inicio'] );
//VEHICULO
Route::get('/vehiculo',[baseController::class, 'vehiculo'] );
Route::post('/setvehiculo',[vehiculoController::class, 'setVehiculo']);
Route::post('/createVehiculo',[vehiculoController::class, 'addVehiculo']);
Route::post('/deleteVehiculo',[vehiculoController::class, 'deleteVehiculo']);
//PROPIETARIOS
Route::get('/propietario',[baseController::class, 'propietario'] );
Route::post('/createPropietario',[propietarioController::class, 'addPropietario'] );
Route::post('/setPropietario',[propietarioController::class, 'setPropietario'] );
Route::post('/deletePropietario',[propietarioController::class, 'deletePropietario'] );
//CONDUCTORES
Route::get('/conductor',[baseController::class, 'conductor'] );
Route::get('/conductor/{id}',[conductorController::class, 'getConductor'] );
Route::post('/createConductor',[conductorController::class, 'addConductor'] );
Route::post('/setConductor',[conductorController::class, 'setConductor'] );
Route::post('/deleteConductor',[conductorController::class, 'deleteConductor'] );




