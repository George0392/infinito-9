<?php

namespace App\Http\Livewire\Obd2;

use Livewire\Component;
use App\Models\Obd2;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\StoreObd2Request;
use App\Http\Requests\UpdateObd2Request;

use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Exports\Obd2Export;

class Obd2Component extends Component
{

// ***********************************************************
// Variables de entorno
// ***********************************************************
    use WithFileUploads;
    use WithPagination;
     use LivewireAlert;

    protected $paginationTheme = 'bootstrap';

// ***********************************************************
// Variables
// ***********************************************************

    public $codigo, $descripcion, $selected_id, $buscar;

    public $componente = ' Codigos Obd2 ';
    public $titulo = 'Listado';

    private $lista = 20;

    public $listeners = [
                        'crear'     =>  'guardar',
                        'modificar' =>  'actualizar',
                        'borrar'    =>  'eliminar'
                        ];

// ***********************************************************
// Cargar primeras variables
// ***********************************************************


    public function mount()
    {
        $this->componente;
        $this->titulo;
    }

// ***********************************************************
// Render de Vistas
// ***********************************************************

    public function render()
    {

        $total = Obd2::count();

        return view('livewire.obd2.obd2-component',[
             'obd2' => $this->Buscar(),
             'total'      => $total
         ])
        ->extends('app2.plantilla')
        ->section('content_body');

    }

// ***********************************************************
// Consultas a BD
// ***********************************************************

    public function Buscar()
    {

        if(strlen($this->buscar) > 0)

            $sql = Obd2::where('codigo', 'like', '%' . $this->buscar . '%')
                    ->orderBydesc('id')
                    ->paginate($this->lista);
        else

            $sql = Obd2::orderBydesc('id')
                    ->paginate($this->lista);

        return $sql;
    }

// ***********************************************************
// CRUD
// ***********************************************************

// ***********************************************************
// Validaciones
// ***********************************************************

    public function error($msg1,$msg2)
    {

        $this->emit('alert', ['type' => 'error', 'message' => $msg1 . ' ' .$this->componente . '  ' . $msg2]);

    }
// ****************************************************************
// validaciones antes de guardar
// ****************************************************************

    protected function reglas_guardar(): array
    {
    return (new StoreObd2Request())->rules();
    }

    protected function msj_guardar(): array
    {
    return (new StoreObd2Request())->messages();
    }
// ****************************************************************
// validaciones antes de actualizar
// ****************************************************************

    // protected function reglas_guardar(): array
    // {
    // return (new UpdateObd2Request())->rules();
    // }

    protected function msj_actualizar(): array
    {
    return (new UpdateObd2Request())->messages();
    }




// ***********************************************************
// Resetear todos los campos del formulario
// ***********************************************************
    public function resetUI()
    {
        $this->reset();
        $this->componente ;
        $this->titulo ;
        $this->resetValidation();

    }


// ***********************************************************
// Guardar
// ***********************************************************

    public function guardar()
    {

        $this->validate($this->reglas_guardar(),$this->msj_guardar());

        $obd2 = Obd2::Create([
            'codigo'      => $this->codigo,
            'descripcion' => $this->descripcion,
            ]);

            $this->resetUI();

            $this->alert('success', 'Registro Almacenado');

            // return redirect()->route('obd2.index');


    }

// ***********************************************************
// Editar
// ***********************************************************

    public function Editar($id)
    {
        $sql = Obd2::findOrFail($id);
        // dd($sql);
        //campos a rellenar
        $this->selected_id = $sql->id;
        $this->codigo      = $sql->codigo;
        $this->descripcion = $sql->descripcion;

    }

// ***********************************************************
// Actualizar
// ***********************************************************

    public function actualizar()
    {
         $rules =
        [
            'codigo' => 'required|string|max:12|unique:obd2,codigo,'.$this->selected_id,
            'descripcion' => 'required',
        ];

        $this->validate($rules,$this->msj_actualizar());

            $obd2 = Obd2::find($this->selected_id);

        // *************************************************

            $obd2->update([
            'codigo'      => $this->codigo,
            'descripcion' => $this->descripcion,

                ]);

            $this->resetUI();

            $this->alert('success', 'Registro Actualizado');

    }

// ***********************************************************
// Eliminar
// ***********************************************************

    public function eliminar($id)
    {

            $obd2 = Obd2::find($id);
            $obd2->delete();

            $this->alert('success', 'Registro Eliminado');
            $this->resetUI();
    }


// ***********************************************************
// Exportar
// ***********************************************************

    public function excel()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export Obd2Export --model=Obd2
        // luego ir a app/Exports y crear la consulta en el archivo creado

        $this->alert('success', 'Registros exportados a Excel con Exito', [
                        'position' => 'center'
                    ]);
        return Excel::download(new Obd2Export,'listado_obd2.xlsx');
    }

    public function csv()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export Obd2Export --model=Obd2
        // luego ir a app/Exports y crear la consulta en el archivo creado

        $this->alert('success', 'Registros exportados a CSV con Exito', [
                        'position' => 'center'
                    ]);

       return (new Obd2Export)->download('listado_categorias.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv',]);


    }

}