<?php

namespace App\Http\Controllers\Configuracion;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('configuracion.usuarios.index');

    }
    public function create()
    {
        return view('configuracion.usuarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->status = 'active';
        $user->modified_by = Auth::user()->email;
        $user->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro creado con éxito!');  
        return to_route('configuracion.usuarios.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $row = User::find($id);
        return view('configuracion.usuarios.edit',['usuario'=> $row]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required','max:50','unique:users,email,'.$id],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $row = User::find($id);
        $row->name = $request->input('nombre');
        $row->password = $request->input('password');
        $row->modified_by = Auth::user()->email;
        $row->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro editado con éxito!');  
        return to_route('configuracion.usuarios.index');
    }

    public function destroy(string $id)
    {
        $area = User::find($id);
        $area->status = 'inactive';
        $area->modified_by = Auth::user()->email;
        $area->save();
        session()->flash('msg_tipo','success');
        session()->flash('msg','Registro deshabilitado con éxito!');   
        return to_route('configuracion.usuarios.index');
    }
}
