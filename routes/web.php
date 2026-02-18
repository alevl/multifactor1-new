<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Acceso\Login;
use App\Http\Controllers\SalirController;
use App\Http\Controllers\LocaleController;

use App\Livewire\Home\Home;

use App\Livewire\Admin\DashboardAdmin;
use App\Livewire\Admin\MaquinasAdmin;
use App\Livewire\Admin\ClientesAdmin;
use App\Livewire\Admin\PerfilAdmin;

use App\Livewire\Franquiciado\DashboardF;
use App\Livewire\Franquiciado\PerfilF;
use App\Livewire\Franquiciado\LecturasF;
use App\Livewire\Franquiciado\Dispositivos;
use App\Livewire\Franquiciado\Alertas;

use App\Livewire\User\Dashboard;
//use App\Livewire\User\Configuracion;
use App\Livewire\User\Perfil;
use App\Livewire\User\Semaforos;

use App\Livewire\Lectura\DashboardRead;
use App\Livewire\Lectura\PerfilRead;

use App\Livewire\Registro;
use App\Livewire\ImprimirQR;

/*APARTADO LOGIN*/
Route::get('/turuta', function(){
    Artisan::call('storage:link');
});

Route::get('acceso', function () {
    return view('livewire.acceso.login');
})->name('login');

/*APARTADO IDIOMA*/
Route::get('locale/{lang}', [LocaleController::class, 'setLocale']);
/*FIN*/

Route::get('/', Home::class)->name('home');
/*
Route::get('/', function(){
    return redirect('https://apedidos.net');
});
*/
Route::post('acceso', [Login::class, 'acceso'])->name('acceso.acceso');
Route::get('salir',[SalirController::class, 'cierre'])->name('salir.cierre');
Route::get('register/{id_maquina}', Registro::class)->name('registro');
Route::middleware(['auth:sanctum', 'verified'])->get('imprimirqr/{id_maquina}', ImprimirQR::class)->name('imprimirqr');

/*APARTADO ADMIN*/
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard-admin', DashboardAdmin::class)->name('dashboard-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('client-admin', ClientesAdmin::class)->name('clientes-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('machines-admin', MaquinasAdmin::class)->name('maquinas-admin');
Route::middleware(['auth:sanctum', 'verified'])->get('profile-admin', PerfilAdmin::class)->name('perfil-admin');

/*APARTADO FRANQUICIADO*/
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard-franchisee', DashboardF::class)->name('dashboard-franchisee');
Route::middleware(['auth:sanctum', 'verified'])->get('profile-franchisee', PerfilF::class)->name('perfil-franchisee');
Route::middleware(['auth:sanctum', 'verified'])->get('data-franchisee', LecturasF::class)->name('datos-franchisee');
Route::middleware(['auth:sanctum', 'verified'])->get('devices', Dispositivos::class)->name('dispositivos');
Route::middleware(['auth:sanctum', 'verified'])->get('alertas', Alertas::class)->name('alertas');

/*APARTADO USER*/
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', Dashboard::class)->name('dashboard');
//Route::middleware(['auth:sanctum', 'verified'])->get('setting', Configuracion::class)->name('configuracion');
Route::middleware(['auth:sanctum', 'verified'])->get('profile', Perfil::class)->name('perfil');
Route::middleware(['auth:sanctum', 'verified'])->get('semaforos', Semaforos::class)->name('semaforos');

/*APARTADO LECTURA*/
Route::middleware(['auth:sanctum', 'verified'])->get('dashboard-read', DashboardRead::class)->name('dashboard-read');
Route::middleware(['auth:sanctum', 'verified'])->get('profile-read', PerfilRead::class)->name('perfil-read');
