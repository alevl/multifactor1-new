<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\DatosController;
use App\Http\Controllers\DatosSalidasController;
use App\Http\Controllers\SemaforoController;
use App\Http\Controllers\MovilController;
use App\Http\Controllers\AppController;

Route::get('r/{v}', [EntradasController::class, 'entradas']);
Route::get('datos/{id_usuario}', [DatosController::class, 'dispositivos']);
Route::get('salidas/{id_usuario}', [DatosSalidasController::class, 'salidas']);
Route::get('s/{v}', [SemaforoController::class, 'entradas_semaforo']);
Route::get('entrada/{id_dispositivo}', [MovilController::class, 'entrada']);
Route::get('salida/{id_dispositivo}', [MovilController::class, 'salida']);
/*APIS DE LA APP*/
Route::get('dias', [AppController::class, 'dias']);
Route::get('horas', [AppController::class, 'horas']);
Route::get('minutos', [AppController::class, 'minutos']);
Route::get('signos', [AppController::class, 'signos']);
Route::get('enteros', [AppController::class, 'enteros']);
Route::get('decimales', [AppController::class, 'decimales']);
Route::get('calibrar-temperatura', [AppController::class, 'calibrar_temperatura']);
Route::get('cambio-fecha', [AppController::class, 'cambio_fecha']);
Route::get('setpoint', [AppController::class, 'setpoint']);
Route::get('descongelamiento', [AppController::class, 'descongelamiento']);
Route::get('encendido-permanente', [AppController::class, 'encendido_permanente']);
Route::get('encender-apagar', [AppController::class, 'encender_apagar']);
Route::get('leer-dispositivo', [AppController::class, 'leer_dispositivo']);
