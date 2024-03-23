<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\Obd2Import;
// use App\Imports\ProviderImport;
// use App\Imports\ClientImport;
// use App\Imports\ProductImport;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class DBimportController extends Controller
{
    public function index()
    {
        return view('app.sysadmin.importar.index');
    }


    public function import_obd2(Request $request)
    {
        $file = $request->file('reg_obd2');
        // php artisan make:import Obd2Import --model=Obd2
        Excel::import(new Obd2Import, $file);

        toastr()->success('Codigos Obd2 .... Se importaron todos los registros correctamente','Exito');

        return back()->with('message', 'Importado con exito');

    }


    public function import_providers(Request $request)
    {
        $file = $request->file('proveedores');
        // php artisan make:import ProviderImport --model=Provider
        Excel::import(new ProviderImport, $file);

        toastr()->success('Proveedor .... Se importaron todos los registros correctamente','Exito');

        return back()->with('message', 'Importado con exito');

    }


    public function import_clients(Request $request)
    {

        $file = $request->file('clientes');
        // php artisan make:import ProviderImport --model=Provider
        Excel::import(new ClientImport, $file);

        toastr()->success('Cliente .... Se importaron todos los registros correctamente','Exito');

        return back()->with('message', 'Importado con exito');

    }


    public function import_products(Request $request)
    {
        $file = $request->file('productos');
        // php artisan make:import ProviderImport --model=Provider
        Excel::import(new ProductImport, $file);

        toastr()->success('Producto .... Se importaron todos los registros correctamente','Exito');

        return back()->with('message', 'Importado con exito');

    }
}
