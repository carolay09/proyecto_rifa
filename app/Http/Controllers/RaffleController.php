<?php

namespace App\Http\Controllers;

use App\Models\Raffle;
use App\Models\Product;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('index', 'create', 'store', 'edit', 'update');
    }

    public function index()
    {
        $raffles = Raffle::join('states','raffles.idEstado', '=', 'states.id')
        ->join('products','raffles.idProducto','=','products.id')
        ->select('raffles.*','states.nombre as nombreEstado','products.nombre as nombreProducto')
        ->get();;
        return view('administracion/raffles-index', compact('raffles'));
    }

    public function create()
    {
        $products = Product::where('products.idEstado', '=', '8')->get();
        return view('administracion/raffles-create', compact('products'));
        
    }

    public function store(Request $request)
    {
        $raffle = new Raffle;
        $raffle->precioTicket = $request->precio;
        $raffle->cantidadPart = $request->cantidad;
        $raffle->idProducto = $request->producto;
        $raffle->fechaSorteo = $request->fecha; 
        $raffle->idEstado = '2';
        $raffle->save();

        return redirect('raffles');
    }

    public function edit($id)
    {
        $raffle = Raffle::findOrFail($id);
        $products= Product::where('products.idEstado', '=', '8')->get();
        // $oldDate = strtotime('03/08/2020');
        // $newDate = date('Y-m-d',$time);
        // echo $newDate;
        // $cambio = $request->fechaSorteo->form_date->format('Y-m-d');
        // $raffle->fechaSorteo = $cambio;     
        
        return view('administracion/raffle-edit', compact('raffle','products'));
    }

    public function update(Request $request, Raffle $raffle)
    {
        $raffle = Raffle::findOrFail($raffle->id);
        $raffle->precioTicket = $request->precio;
        $raffle->cantidadPart = $request->cantidad;
        $raffle->idProducto = $request->producto;
        // // {{ $user->from_date->format('d/m/Y')}}
        // $cambio = $request->fechaSorteo->form_date->format('Y-m-d');
        $raffle->fechaSorteo = $request->fechaSorteo;        
        $raffle->update();

        return redirect('raffles');
    }

    public function update_state(Request $request, $id)
    {
        $raffle = Raffle::findOrFail($id);
        if($request->nombreEstado == 'publicado'){
            $raffle->idEstado = '2';
        }
        else if($request->idEstado = 'sin publicar'){
            $raffle->idEstado = '1';
        }
        $raffle->update();
        
        return redirect('raffles');
    }

    public function mostrar($id){
        $raffle = Raffle::join('tickets', 'raffles.id', '=', 'tickets.idRifa')
        ->join('users', 'tickets.idUsuario', '=' ,'users.id')
        ->where('raffless.id', '=', $id)
        ->select('tickets.*','users.*','raffles.*')
        ->get();


        return view('administracion/tickets', compact('raffle'));
    }
}
