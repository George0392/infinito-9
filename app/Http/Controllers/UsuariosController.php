<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Input;


class UsuariosController extends Controller
{

    public function index()
    {
        $usuarios = User::select('id','name','phone','email')
        ->where('name', 'like', '%'.Input::get('searchtext').'%')
        ->orWhere('email', 'like', '%'.Input::get('searchtext').'%')
        ->orderBy('id')
        ->paginate();

        return view('app.permisos.usuarios.index',compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('app.permisos.usuarios.create',compact('roles'));
    }


    public function store(Request $request)
    {
         $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|same:confirmar-password',
            'roles'    => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        toastr()->info(' Registros Cargados Exitosamente','Exito');

        return redirect()->route('usuarios.index');
    }

    public function edit($id)
    {
        $usuario  = User::find($id);
        $roles    = Role::pluck('name','name')->all();
        $userRole = $usuario->roles->pluck('name','name')->all();

        return view('app.permisos.usuarios.edit',compact('usuario','roles','userRole'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles'    => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        toastr()->info(' Registros Actualizados Exitosamente','Exito');

        return redirect()->route('usuarios.index');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        toastr()->info(' Registros Eliminados Exitosamente','Exito');
        return redirect()->route('usuarios.index');
    }
}
