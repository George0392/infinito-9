<?php

namespace App\Http\Livewire\AsignarPermisos;

use Livewire\Component;

use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;

use Jantinnerezo\LivewireAlert\LivewireAlert;

class AsignarComponent extends Component
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

    public $role, $permisos_selected = [] ,$old_permissions = [] ;

    public $componente = 'Cargos y permisos ';
    public $titulo = 'Listado';

    private $lista = 20;

    // protected $listeners = ['Sincronizar_Todos','Eliminar_Todos'];

public $listeners = ['permisos'=>'Sincronizar_Todos',
                     'quitar'=>'Eliminar_Todos'
                    ];

// ***********************************************************
// Cargar primeras variables
// ***********************************************************


    public function mount()
    {
        $this->componente;
        $this->titulo;
         $this->role = 'Elegir';

    }

// ***********************************************************
// Render de Vistas
// ***********************************************************

    public function render()
    {

        $total = Permission::count();

        // seleccionar campos id name y crear columna checked con valor por defecto 0
        $permisos = Permission::select('id','name', DB::raw(" 0 as checked "))
                    ->orderBy('name','asc')
                    ->paginate($this->lista);

        // relacion entre la tabla permissions y roles
        // dibujar check activos e inactivos

        if ($this->role != 'Elegir')
        {
            $list = Permission::join('role_has_permissions as rp','rp.permission_id', 'permissions.id')
                ->where('role_id', $this->role)->pluck('permissions.id')->toArray();

            $this->old_permissions = $list;
        }

        // pintar checkbox segun rol seleccionado

        if ($this->role != 'Elegir')
        {
            foreach( $permisos as $permiso)
            {
                $role = Role::find($this->role);

                $tiene_permiso = $role->hasPermissionTo($permiso->name);

                if ($tiene_permiso)
                {
                    $permiso->checked = 1;

                }
            }

        }

        return view('livewire.asignar-permisos.asignar-component',[
             'roles'    => Role::orderBy('name','asc')->get(),
             'permisos' => $permisos,
             'total'    => $total,
         ])
        ->extends('app2.plantilla')
        ->section('content_body');

    }


// ***********************************************************
// limpiar checkbox
// ***********************************************************
public function  Eliminar_Todos()
{
    if ( $this->role == 'Elegir')
    {
        // msj
        $this->alert('error', 'Selecciona un Rol Valido');
        return;
    }

    $role = Role::find($this->role);
    $role->syncPermissions([0]);
    $this->alert('success', "Se eliminaron los Permisos del rol $role->name" );
}

// ***********************************************************
// seleccionar todos checkbox
// ***********************************************************
public function Sincronizar_Todos()
{
    if ( $this->role == 'Elegir')
    {
        // msj
         $this->alert('error', "Selecciona un Rol Valido" );

        return;
    }

    $role = Role::find($this->role);
    $permisos = Permission::pluck('id')->toArray();
    $role->syncPermissions($permisos);
    $this->alert('success', "se sincronizaron todos los permisos del rol $role->name" );
}

// ***********************************************************
// permiso del checkbox seleccionado
// ***********************************************************
 public function Sincronizar_Permiso($state, $permisoName)
 {
    if($this->role != 'Elegir')
    {
        $roleName = Role::find($this->role);
        if ($state)
        {
            $roleName->givePermissionTo($permisoName);
            $this->alert('success',"Permiso asignado correctamente");
        }
        else
        {
            $roleName->revokePermissionTo($permisoName);
            $this->alert('success',"Permiso eliminado correctamente");

        }
    }
    else
    {
      $this->alert('error', "Seleccionar Permiso Valido");
    }
 }


}
