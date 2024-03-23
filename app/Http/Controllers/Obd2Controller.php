<?php

namespace App\Http\Controllers;

use App\Models\Obd2;
use App\Http\Requests\StoreObd2Request;
use App\Http\Requests\UpdateObd2Request;

use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Obd2Export;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class Obd2Controller extends Controller
{

   public function __construct()
    {

    // el usuario super-admin se coloca en app/providers/authserviceprovider

    // permisos de ver
   $this->middleware( 'permission: ver-obd2|crear-obd2|editar-obd2|borrar-obd2|reportes-obd2')->only('error_obd.index');

    // permisos de crear
    $this->middleware( 'permission: crear-obd2')->only('error_obd.create','error_obd.store');

    // permisos de crear
    $this->middleware( 'permission: editar-obd2')->only('error_obd.update','error_obd.edit');

    // permisos de borrar
    $this->middleware( 'permission: borrar-obd2')->only('error_obd.destroy');

    }


  public function index()
    {
        $cuenta = Obd2::count();
        // Busqueda Basica
        $error_obd =
        Obd2::select('id','codigo','descripcion')
             ->where('codigo', 'like', '%'.Input::get('searchtext').'%')
             ->orWhere('descripcion', 'like', '%'.Input::get('searchtext').'%')
             ->orderByDesc('id')
             ->paginate(30);
            toastr()->info(' Registros Cargados Exitosamente','Exito');
        return view('app.obd2.index',compact('error_obd','cuenta'));

    }


    public function create()
    {
            return view('app.obd2.create');

    }

    public function store(StoreObd2Request $request)
    {

        Obd2::create($request->all());
        toastr()->success(' Registro Almacenado Exitosamente!','Exito');
        return back();

    }

     public function show($id)
     {

        $error_obd = Obd2::findOrFail($id);
        return view('app.obd2.show',compact('error_obd'));

    }

    public function edit($id)
    {
        $error_obd = Obd2::find($id);

        return view('app.obd2.edit', compact('error_obd'));
    }

    public function update(UpdateObd2Request $request, $id)
    {
         //validar formulario y editar
        $error_obd = Obd2::findOrFail($id);
        $error_obd->fill($request->all())->save();
        // dd($error_obd);

        toastr()->success(' Registros Editados Exitosamente','Exito');

        return redirect()->route('obd2.index');
    }

    public function destroy($id)
    {
        // if(Product::where('category_id', '=', $id)->first() != null){

        //     toastr()->error('No se puede eliminar la Categoria .... se encuentra asignada a un Producto!','Error');
        //     }
        // else {
        $error_obd = Obd2::findOrFail($id);
        $error_obd->delete();
        toastr()->success(' Registros ELIMINADOS Exitosamente','Exito');
        // }
        return back();
    }


    public function exportarpdf($id)
    {
        //se utiliza en show
        $error_obd = Obd2::findOrFail($id);
        $pdf=PDF::loadView('app.obd2.pdf',compact('error_obd'))
        //vertical
        ->setPaper('letter', 'portrait')
        //horizontal
        // ->setPaper('letter', 'landscape')
        ;

        // muestra en el navegador
        return $pdf->stream($error_obd->codigo.'.pdf');
    }

    public function listado_pdf()
    {
        $error_obd = Obd2::select('id','codigo','descripcion')->get();
        $pdf=PDF::loadView('app.obd2.listado_pdf',compact('error_obd'))
        ->setPaper('letter', 'portrait');

        $pdf->render();

$dompdf = $pdf->getDomPDF();
$font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
$dompdf->get_canvas()->page_text(564, 765, "{PAGE_NUM} / {PAGE_COUNT}", $font, 8, array(0, 0, 0));


        // muestra en el navegador
        return $pdf->stream('listado_categorias.pdf');

        // return (new Obd2Export)->download('listado_categorias.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function listado_excel()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export Obd2Export --model=Obd2
        // luego ir a app/Exports y crear la consulta en el archivo creado

        return Excel::download(new Obd2Export,'listado_categorias.xlsx');


    }

     public function listado_csv()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export Obd2Export --model=Obd2
        // luego ir a app/Exports y crear la consulta en el archivo creado

       return (new Obd2Export)->download('listado_categorias.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv',]);


    }

}
