<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Sale;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('index', 'create', 'store');
        $this->middleware('cliente')->only('update');
    }
    
    public function index()
    {
        $users = User::join('roles', 'users.idRol', '=', 'roles.id')
        ->join('states','users.idEstado', '=', 'states.id')
        ->select('users.*','states.nombre as nombreEstado','roles.nombre as nombreRol')
        ->get();
        return view('administracion/users-index', compact('users'));
    }

    public function create()
    {
        // $roles = Rol::all();


        return view('administracion/users-create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->nombre = $request->nombre;
        $user->dni = $request->dni;
        $user->apellido = $request->apellido;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->idRol = '2';
        $user->idEstado = '10';

        $user->save();

        return redirect('users');
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, User $user)
    {
       $user = User::findOrFail($user->id);
       $user->nombre = $request->nombre;
       $user->apellido = $request->apellido;
       $user->email = $request->email;
       $user->dni = $request->dni;
       $user->telefono = $request->telefono;
       $user->update();

       $sale = Sale::join('states', 'sales.idEstado', '=', 'states.id')
            ->where('sales.idUsuario', '=', auth()->user()->id)
            ->where('states.nombre', 'like', 'pendiente')
            ->select('sales.id', 'sales.total')
            ->first();
        

       return view('cliente.metodos-pago', compact('sale'));
    }

    public function update_state(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($request->nombreEstado == 'activo'){
            $user->idEstado = '11';
        }
        else if($request->idEstado = 'inactivo'){
            $user->idEstado = '10';
        }
        $user->update();
        
        return redirect('users');
    }
}
