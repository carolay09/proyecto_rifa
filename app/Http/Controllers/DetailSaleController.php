<?php

namespace App\Http\Controllers;

use App\Models\DetailSale;
use App\Models\Product;
use App\Models\Sale;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailSaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('cliente')->only('index', 'store', 'destroy');
    }
    public function index()
    {
        $detail_sales = DetailSale::join('sales', 'detail_sales.idVenta', '=', 'sales.id')
            ->join('raffles', 'detail_sales.idRaffle', '=', 'raffles.id')
            ->join('products', 'raffles.idProducto', '=', 'products.id')
            // ->join('tickets', 'raffles.id', '=', 'tickets.idRaffle')
            ->where('sales.idUsuario', '=', auth()->user()->id)
            ->where('sales.idEstado', '=', '3')
            ->select('products.nombre', 'products.imagen', 'raffles.fechaSorteo', 'raffles.precioTicket', 'detail_sales.precio', 'detail_sales.cantidad', 'detail_sales.id')
            ->get();

        $sale_id = Sale::where('idUsuario', '=', auth()->user()->id)
            ->where('idEstado', '=', '3')
            ->orderByDesc('id')
            ->select('id')
            ->first();
 
        return view('cliente.carrito',compact('detail_sales', 'sale_id'));
    }

    public function store(Request $request)
    {   

        $venta = Sale::join('states', 'sales.idEstado', '=', 'states.id')
            ->where('sales.idUsuario', '=', auth()->user()->id)
            ->where('states.nombre', 'like', 'pendiente')
            ->select('sales.id', 'states.nombre')
            ->first();
        
        $datos_rifa = Product::join('raffles', 'products.id', '=', 'raffles.idProducto')
            ->where('products.id', '=', $request->idProducto)
            ->select('raffles.id', 'raffles.precioTicket')
            ->first();

        if($venta == null){
            $sale = new Sale;
            $sale->idEstado = '3';
            // $sale->idEstado = State::where('nombre', 'like', 'pendiente')->select('id')->first();
            $sale->idUsuario = auth()->user()->id;
            $sale->save();

            $detailSale = new DetailSale;
            $detailSale->cantidad = $request->cantidad;
            // $detailSale->precio = $request->precio;
            $detailSale->precio = $datos_rifa->precioTicket;
            $detailSale->total = $request->precio * $request->cantidad;
            $detailSale->idVenta = $sale->id;
            $detailSale->idRaffle = $datos_rifa->id;
            $detailSale->save();
        }else if($venta->nombre == 'pendiente'){
            //consultar si el producto se encuentra en el carrito
            // if(DetailSale::join('sales', 'detail_sales.idVenta', '=', 'sales.id')
            //     ->where('sales.idUsuario', '=', auth()->user()->id)
            //     ->where('sales.id', '=', $venta->id)
            //     ->count() == 0               
            // ){
            $detailSale = new DetailSale;
            $detailSale->cantidad = $request->cantidad;
            $detailSale->precio = $request->precio;
            $detailSale->total = $request->precio * $request->cantidad;
            $detailSale->idVenta = $venta->id;
            $detailSale->idRaffle = $datos_rifa->id;
            $detailSale->save();
            // }else{

            //     //retornar un mensaje de producto en carrito
            //     return redirect('/');
            // }

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
            $detailSale->idRaffle = $datos_rifa->id;
            $detailSale->save();
        }
        return redirect('detail_sales');
    }

    public function edit(DetailSale $detailSale)
    {
        //
    }


    //=========verificar si se esta usando===========================
    // public function update($id, Request $request)
    // {
        // $sale = Sale::findOrFail($id);
        // $sale->idEstado = '4';
        // $sale->total = $request->total;
        // $sale->update();

    //     return redirect('products');
    // }

    public function destroy($id)
    {
        $detail_sales = DetailSale::findOrFail($id);
        $detail_sales->delete();

        return redirect('detail_sales');
    }
}