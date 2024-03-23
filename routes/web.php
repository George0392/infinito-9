<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Obd2Controller;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// ###############################################################
//                         rutas de seguridad
// ###############################################################

Route::group(['middleware' => ['auth']], function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');

//Importar datos a BD
    Route::get('Importar/import','App\Http\Controllers\DBimportController@index')->name('import-DB');



// ###########################################################################################
//                                     Categorias
// ###########################################################################################

// rutas de Categorias
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
