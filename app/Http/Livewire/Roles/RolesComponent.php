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

    public $name, $selected_id, $buscar, $permission ;

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

        $total = Role::count();


        return view('livewire.roles.roles-component',[
             'roles'      => $this->Buscar(),
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

            $sql = Role::where('name', 'like', '%' . $this->buscar . '%')
                    ->orderBy('name')
                    ->paginate($this->lista);
        else

            $sql = Role::orderBy('name','asc')
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
            'name'         => 'required|unique:roles,name|min:3',
        ];

    protected $mensajes =
        [
            'name.required' => 'Rol o Cargo Obligatorio',
            'name.unique'   => 'Rol o Cargo ya existe',
            'name.min'      => 'Rol o Cargo  debe tener al menos 3 caracteres',
        ];



// ***********************************************************
// Guardar
// ***********************************************************

    public function guardar()
    {

       $this->validate($this->reglas_guardar,$this->mensajes);

        $roles = Role::create([
            'name' => $this->name]);

            $this->resetUI();

            $this->alert('success', 'Registro Almacenado');

    }

// ***********************************************************
// Editar
// ***********************************************************

    public function Editar($id)
    {
        $sql = Role::findOrFail($id);

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
            'name' => 'required|string|max:12|unique:roles,name,'.$this->selected_id,
        ];

        $this->validate($rules);

            $roles = Role::find($this->selected_id);

        // *************************************************

            $roles->update([
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
        $permisos_cuenta = Role::find($id)->permissions->count();

        if($permisos_cuenta > 0)
        {
            $this->alert('error', 'Imposible eliminar el Rol ya que tiene permisos asociados');
            return;
        }
        else
        {
            Role::find($id)->delete();
            $this->alert('success', 'Registro Eliminado');
        }
            $this->resetUI();
    }

// ***********************************************************
// Asignar Roles
// ***********************************************************

    public function AsignarRoles($rolesList)
    {
        if ($this->userSelected > 0 )
        {
            $user = User::find($this->userSelected);
            if ($user)
            {
                $user->syncRoles($rolesList);
                 $this->alert('success', 'Roles Asignados Correctamente');
                 $this->resetUI();
            }
        }
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