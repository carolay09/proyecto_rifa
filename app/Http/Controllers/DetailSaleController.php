<?php

namespace App\Http\Controllers;

use App\Models\DetailSale;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_sales = DetailSale::join('sales', 'detail_sales.idVenta', '=', 'sales.id')
            ->join('raffles', 'detail_sales.idRaffle', '=', 'raffles.id')
            ->join('products', 'raffles.idProducto', '=', 'products.id')
            // ->join('tickets', 'raffles.id', '=', 'tickets.idRaffle')
            ->where('sales.idUsuario', '=', auth()->user()->id)
            ->where('sales.idEstado', '=', '3')
            ->select('products.nombre', 'raffles.fechaSorteo', 'raffles.precioTicket', 'detail_sales.precio', 'detail_sales.cantidad', 'detail_sales.id')
            ->get();
        
        return view('cliente.carrito',compact('detail_sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //========revisar por q id de sales es igual a 3}=============

        $venta = Sale::join('state', 'sales.idEstado', '=', 'state.id')
            ->where('sales.idUsuario', '=', auth()->user()->id)
            ->where('state.nombre', 'like', 'pendiente')
            ->select('sales.id', 'state.nombre')
            ->first();
        // $venta = Sale::where('idUsuario', '=', auth()->user()->id)
        //     ->where('idEstado', 'like', '3')
        //     ->first();
        // $venta = DB::select("SELECT a.id, b.nombre FROM sales a INNER JOIN state b ON a.idEstado = b.id WHERE a.idUsuario = '1' AND b.nombre LIKE 'pendiente'");
        // return($venta);
        if($venta == null){
            $sale = new Sale;
            $sale->idEstado = '3';
            $sale->idUsuario = auth()->user()->id;
            $sale->save();

            $detailSale = new DetailSale;
            $detailSale->cantidad = $request->cantidad;
            $detailSale->precio = $request->precio;
            $detailSale->total = $request->precio * $request->cantidad;
            $detailSale->idVenta = $sale->id;
            $detailSale->idRaffle = '1';
            $detailSale->save();
        }else if($venta->nombre == 'pendiente'){
            $detailSale = new DetailSale;
            $detailSale->cantidad = $request->cantidad;
            $detailSale->precio = $request->precio;
            $detailSale->total = $request->precio * $request->cantidad;
            $detailSale->idVenta = $venta->id;
            $detailSale->idRaffle = '1';
            $detailSale->save();

        }else if($venta->nombre != 'pendiente'){
            $sale = new Sale;
            $sale->idEstado = '3';
            $sale->idUsuario = auth()->user()->id;
            $sale->save();

            $detailSale = new DetailSale;
            $detailSale->cantidad = $request->cantidad;
            $detailSale->precio = $request->precio;
            $detailSale->total = $request->precio * $request->cantidad;
            $detailSale->idVenta = $venta->id;
            $detailSale->idRaffle = '1';
            $detailSale->save();
        }
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailSale  $detailSale
     * @return \Illuminate\Http\Response
     */
    public function show(DetailSale $detailSale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailSale  $detailSale
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailSale $detailSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailSale  $detailSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailSale $detailSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailSale  $detailSale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_sales = DetailSale::findOrFail($id);
        $detail_sales->delete();

        return redirect('detail_sales');
    }
}
