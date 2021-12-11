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
        $raffles = Raffle::all();
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
        $raffle->fechaSorteo = $request->fecha;        
        $raffle->save();

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
        $raffle->fechaSorteo = $request->fecha;        
        $raffle->update();

        return redirect('raffles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Raffle  $raffle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raffle $raffle)
    {
        //
    }
}
