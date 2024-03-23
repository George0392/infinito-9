<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Obd2;
// use App\Models\Proveedores;
// use App\Models\Clientes;
// use App\Models\Productos;



class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


       public function index()
    {
        $cont_obd2  = Obd2::count();
        // $cont_productos   = Productos::count();
        // $cont_proveedores = Proveedores::count();
        // $cont_clientes    = Clientes::count();
        $cont_user        = User::count();


        return view('home',compact('cont_user','cont_obd2'));
    }
}
