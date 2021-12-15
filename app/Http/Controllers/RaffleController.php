<?php

namespace App\Http\Controllers;

use App\Models\Raffle;
use App\Models\Product;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raffles = Raffle::join('states','raffles.idEstado', '=', 'states.id')
        ->join('products','raffles.idProducto','=','products.id')
        ->select('raffles.*','states.nombre as nombreEstado','products.nombre as nombreProducto','products.idEstado as estadoProducto')
        ->get();;
        return view('administracion/raffles-index', compact('raffles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('products.idEstado', '=', '8')->get();
        return view('administracion/raffles-create', compact('products'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $raffle = new Raffle;
        $raffle->precioTicket = $request->precio;
        $raffle->cantidadPart = $request->cantidad;
        $raffle->idProducto = $request->producto;
        // $raffle->estadoProducto = '9';
    
        $raffle->fechaSorteo = $request->fecha; 
        $raffle->idEstado = '2';
        $raffle->save();

        $product = Product::findOrFail($request->producto);
        $product->idEstado = '9';
        $product->update();

        return redirect('raffles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function show(Raffle $raffle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
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
        ->where('raffles.id', '=', $id)
        ->select('tickets.*','users.*','raffles.*')
        ->get();


        return view('administracion/tickets', compact('raffle'));
    }

    
}
