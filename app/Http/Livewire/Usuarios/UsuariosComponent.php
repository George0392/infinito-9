<?php

namespace App\Http\Livewire\Usuarios;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\StoreUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;

use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Exports\UsuariosExport;

use DB;

class UsuariosComponent extends Component
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

    public $name, $phone, $email, $password, $status, $image, $selected_id, $role, $fileLoaded, $buscar;

    public $componente = ' Usuarios ';
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

        return view('livewire.usuarios.usuarios-component',[
              'usuarios' => $this->Buscar(),
              'roles'    => Role::orderBy('name','asc')->get(),
              'total'    => User::count(),
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

            $sql = User::where('name', 'like', '%' . $this->buscar . '%')
                    ->orderBy('name')
                    ->paginate($this->lista);
        else

            $sql = User::orderBy('name')
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
    return (new StoreUsuariosRequest())->rules();
    }

    protected function msj_guardar(): array
    {
    return (new StoreUsuariosRequest())->messages();
    }
// ****************************************************************
// validaciones antes de actualizar
// ****************************************************************

    // protected function reglas_actualizar(): array
    // {
    // return (new UpdateUsuariosRequest())->rules();
    // }

    protected function msj_actualizar(): array
    {
    return (new UpdateUsuariosRequest())->messages();
    }




// ***********************************************************
// Resetear todos los campos del formulario
// ***********************************************************
    public function resetUI()
    {
        $this->reset();
        $this->componente ;
        $this->titulo ;
        $this->image       = null;
        $this->selected_id = 0;

        $this->resetValidation();


    }


// ***********************************************************
// Guardar
// ***********************************************************

    public function guardar()
    {
        // cambiar en config/filesystems.php la linea local
        // 'root'   => storage_path('app'), a
        // 'root'   => public_path(),

        $this->validate($this->reglas_guardar(),$this->msj_guardar());

        $usuarios = User::Create([
                    'name'     => $this->name,
                    'phone'    => $this->phone,
                    'email'    => $this->email,
                    'password' => bcrypt($this->password),
                    'status'   => $this->status,
                                 ]);

         // *************************************************

        $usuarios->assignRole($this->role);

        // *************************************************

        $custom_fileName;
        if ($this->image)
        {
            $custom_fileName = uniqid() . '.' . $this->image->extension();
            $this->image->storeAs('img/usuarios', $custom_fileName);
            $usuarios->image = $custom_fileName;
            $usuarios->save();
        }

            $this->emit('hide-modal','close');

            $this->resetUI();

            $this->alert('success', 'Registro Almacenado');

            // return redirect()->route('usuarios.index');


    }

// ***********************************************************
// Editar
// ***********************************************************

    public function Editar($id)
    {
        $sql = User::findOrFail($id);
        // dd($sql);
        //campos a rellenar

        $this->selected_id = $sql->id;
        $this->name        = $sql->name;
        $this->phone       = $sql->phone;
        $this->email       = $sql->email;
        $this->password    = $sql->password;
        $this->status      = $sql->status;
        $this->image       = null;
        $this->role        = $sql->getRoleNames();

        $this->emit('show-modal','open');

    }

// ***********************************************************
// Actualizar
// ***********************************************************

    public function actualizar()
    {

         $rules =
        [
            'name'     => 'required|string|min:3',
            'phone'    => 'required|string|min:11',
            'email'    => 'required|string|unique:users,email,'.$this->selected_id,
            'status'   => 'required|not_in:Elegir',
            'role'     => 'required|not_in:Elegir',
            'password' => 'required|min:6',
        ];

        $this->validate($rules,$this->msj_actualizar());

            $usuarios = User::find($this->selected_id);

        // *************************************************

            $usuarios->update([
                    'name'     => $this->name,
                    'phone'    => $this->phone,
                    'email'    => $this->email,
                    'password' => bcrypt($this->password),
                    'status'   => $this->status,

                ]);

        // *************************************************

        if ($this->image)
            {
                $custom_fileName   = uniqid() . '.' . $this->image->extension();
                $this->image->storeAs('img/usuarios', $custom_fileName);
            // guardar nombre de image anterior
                $image_name = $usuarios->image;

                $usuarios->image = $custom_fileName;
                $usuarios->save();

                // eliminar basura (image anterior)
                if ($image_name != null)
                {
                    if (file_exists('img/usuarios' . '/' . $image_name))
                    {
                        unlink('img/usuarios' . '/' . $image_name);

                    }

                }

            }

             // *************************************************
            // eliminar rol anterior
        DB::table('model_has_roles')->where('model_id',$this->selected_id)->delete();

         // asignar nuevo rol
        $usuarios->assignRole($this->role);

            $this->emit('hide-modal','close');

            $this->resetUI();

            $this->alert('success', 'Registro Actualizado');

    }

// ***********************************************************
// Eliminar
// ***********************************************************

    public function eliminar($id)
    {

            $usuarios = User::find($id);
            $usuarios->delete();

            $this->alert('success', 'Registro Eliminado');
            $this->resetUI();
    }


// ***********************************************************
// Exportar
// ***********************************************************

    public function excel()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export UsuariosExport --model=Usuarios
        // luego ir a app/Exports y crear la consulta en el archivo creado

        $this->alert('success', 'Registros exportados a Excel con Exito', [
                        'position' => 'center'
                    ]);
        return Excel::download(new UsuariosExport,'listado_usuarios.xlsx');
    }

    public function csv()
    {
        // para generar el archivo se debe colocar:
        // php artisan make:export UsuariosExport --model=Usuarios
        // luego ir a app/Exports y crear la consulta en el archivo creado

        $this->alert('success', 'Registros exportados a CSV con Exito', [
                        'position' => 'center'
                    ]);

       return (new UsuariosExport)->download('listado_categorias.csv', \Maatwebsite\Excel\Excel::CSV, ['Content-Type' => 'text/csv',]);


    }

}