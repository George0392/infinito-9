<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Exports\PermissionExport;

class PermissionComponent extends Component
{

// ***********************************************************
// Variables de entorno
// ***********************************************************

    use WithPagination;
     use LivewireAlert;

    protected $paginationTheme = 'bootstrap';

// ***********************************************************
// Variables
// ***********************************************************

    public $name, $selected_id, $buscar , $guard_name ;

    public $componente = ' Cargos y permisos ';
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

        $total = Permission::count();

        return view('livewire.permission.permission-component',[
             'permission'      => $this->Buscar(),
             'total'      => $total,
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

            $sql = Permission::where('name', 'like', '%' . $this->buscar . '%')
                    ->orderBy('name')
                    ->paginate($this->lista);
        else

            $sql = Permission::orderBy('name')
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
// Validaciones
// ***********************************************************
        protected $reglas_guardar =
        [
            'name'         => 'required|unique:permissions,name|min:3',
        ];

    protected $mensajes =
        [
            'name.required' => 'Permiso Obligatorio',
            'name.unique'   => 'Permiso ya existe',
            'name.min'      => 'Permiso  debe tener al menos 3 caracteres',
        ];



// ***********************************************************
// Guardar
// ***********************************************************

    public function guardar()
    {

       $this->validate($this->reglas_guardar,$this->mensajes);

        $permisos = Permission::create([
            'name' => $this->name]);

            $this->resetUI();

            $this->alert('success', 'Registro Almacenado');

    }

// ***********************************************************
// Editar
// ***********************************************************

    public function Editar($id)
    {
        $sql = Permission::findOrFail($id);
        // dd($sql);
        //campos a rellenar
        $this->selected_id = $sql->id;
        $this->name      = $sql->name;

    }

// ***********************************************************
// Actualizar
// ***********************************************************

    public function actualizar()
    {
         $rules =
        [
            'name' => 'required|string|unique:permissions,name,'.$this->selected_id,
        ];

        $this->validate($rules);

            $permisos = Permission::find($this->selected_id);
            $permisos->update([
            'name'      => $this->name,
                ]);

            $this->resetUI();

            $this->alert('success', 'Registro Actualizado');

    }

// ***********************************************************
// Eliminar
// ***********************************************************

    public function eliminar($id)
    {
        $Roles_cuenta = Permission::find($id)->getRoleNames()->count();

        if($Roles_cuenta > 0)
        {
            $this->alert('error', 'Imposible eliminar el Permiso ya que tiene Roles o Cargos asociados');
            return;
        }
        else
        {
            Permission::find($id)->delete();
            $this->alert('success', 'Registro Eliminado');
        }
            $this->resetUI();
    }


// ***********************************************************
// Exportar
// ***********************************************************

    public function excel()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export PermissionExport --model=Permission
        // luego ir a app/Exports y crear la consulta en el archivo creado

        $this->alert('success', 'Registros exportados a Excel con Exito', [
                        'position' => 'center'
                    ]);
        return Excel::download(new PermissionExport,'listado_permisos.xlsx');
    }

    public function csv()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export PermissionExport --model=Permission
        // luego ir a app/Exports y crear la consulta en el archivo creado

        $this->alert('success', 'Registros exportados a CSV con Exito', [
                        'position' => 'center'
                    ]);

       return (new PermissionExport)->download('listado_categorias.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv',]);


    }

}