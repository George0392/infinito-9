<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;

use App\Http\Controllers\Obd2Controller;

// ###############################################################
//                   rutas de livewire
// ###############################################################
use App\Http\Livewire\Obd2\Obd2Component;
use App\Http\Livewire\Roles\RolesComponent;
use App\Http\Livewire\Permission\PermissionComponent;
use App\Http\Livewire\AsignarPermisos\AsignarComponent;
use App\Http\Livewire\Usuarios\UsuariosComponent;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// ###############################################################
//                   rutas de livewire OBD2
// ###############################################################
Route::get('Codigos_Obd2', Obd2Component::class)->middleware('auth')->name('obd2.live');

Route::get('Roles_infinito', RolesComponent::class)->middleware('auth')->name('roles.live');

Route::get('Permisos_infinito', PermissionComponent::class)->middleware('auth')->name('permisos.live');

Route::get('Asignar_Permisos', AsignarComponent::class)->middleware('auth')->name('asignar.live');

Route::get('Usuarios', UsuariosComponent::class)->middleware('auth')->name('usuarios.live');

// ###############################################################
//                         rutas de seguridad
// ###############################################################

Route::group(['middleware' => ['auth']], function () {

Route::resource('roles', RolesController::class);
Route::resource('usuarios_normal', UsuariosController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

//Importar datos a BD
    Route::get('Importar/import','App\Http\Controllers\DBimportController@index')->name('import-DB');


// ###########################################################################################
//                                     obd2
// ###########################################################################################

// rutas de obd2
    Route::resource('Obd2', Obd2Controller::class)->names('obd2');
//Imprimir show PDF
    Route::get('Obd2/{Obd2}/descargarpdf','App\Http\Controllers\Obd2Controller@exportarpdf')->name('obd2.pdf');

//Imprimir listado PDF
    Route::get('Reportes/Obd2/listado_pdf','App\Http\Controllers\Obd2Controller@listado_pdf')->name('listado_obd2.pdf');

//Imprimir excel
    Route::get('Reportes/Obd2/listado_excel','App\Http\Controllers\Obd2Controller@listado_excel')->name('listado_obd2.xlsx');
//Imprimir csv
    Route::get('Reportes/Obd2/listado_csv','App\Http\Controllers\Obd2Controller@listado_csv')->name('listado_obd2.csv');
//Importar categorias
   Route::post('Importar/Obd2/importar_obd2','App\Http\Controllers\DBimportController@import_obd2')->name('import-obd2');






});
