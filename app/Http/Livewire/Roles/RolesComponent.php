<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Exports\RoleExport;

class RolesComponent extends Component
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

    public $name, $selected_id, $buscar ;

    public $componente = ' Cargos y permisos ';
    public $titulo = 'Listado';

    private $lista = 20;

    protected $listeners = ['guardar','actualizar','eliminar'];

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

        $total = Role::count();
        $permission = Permission::orderBy('name', 'asc')->get();

        return view('livewire.roles.roles-component',[
             'roles'      => $this->Buscar(),
             'total'      => $total,
             'permission' => $permission,
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

            $sql = Role::where('name', 'like', '%' . $this->buscar . '%')
                    ->orderBy('name')
                    ->paginate($this->lista);
        else

            $sql = Role::orderBy('name')
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
            'name'         => 'required|unique:roles|min:3',
        ];

    protected $mensajes =
        [
            'name.required' => 'Nombre Obligatorio',
            'name.unique'   => 'Nombre ya existe',
            'name.min'      => 'Nombre  debe tener al menos 3 caracteres',
        ];



// ***********************************************************
// Guardar
// ***********************************************************

    public function guardar()
    {

       $this->validate($this->reglas_guardar,$this->mensajes);

        $roles = Role::create([
            'name' => $this->name]);

        //sincronizar permisos y roles
            $roles->syncPermissions($this->permission);

            $this->resetUI();

            $this->alert('success', 'Registro Almacenado');

    }

// ***********************************************************
// Editar
// ***********************************************************

    public function Editar($id)
    {
        $sql = Role::findOrFail($id);
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
            'codigo' => 'required|string|max:12|unique:roles,codigo,'.$this->selected_id,
            'descripcion' => 'required',
        ];

        $this->validate($rules,$this->msj_actualizar());

            $roles = Role::find($this->selected_id);

        // *************************************************

            $roles->update([
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

            $roles = Role::find($id);
            $roles->delete();

            $this->alert('success', 'Registro Eliminado');
            $this->resetUI();
    }


// ***********************************************************
// Exportar
// ***********************************************************

    public function excel()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export RoleExport --model=Role
        // luego ir a app/Exports y crear la consulta en el archivo creado

        $this->alert('success', 'Registros exportados a Excel con Exito', [
                        'position' => 'center'
                    ]);
        return Excel::download(new RoleExport,'listado_roles.xlsx');
    }

    public function csv()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export RoleExport --model=Role
        // luego ir a app/Exports y crear la consulta en el archivo creado

        $this->alert('success', 'Registros exportados a CSV con Exito', [
                        'position' => 'center'
                    ]);

       return (new RoleExport)->download('listado_categorias.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv',]);


    }

}