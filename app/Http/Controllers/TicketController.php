<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Raffle;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('cliente')->only('index', 'show');   
    }

    public function index()
    {
        $sorteos = Raffle::join('detail_sales', 'raffles.id', '=', 'detail_sales.idRaffle')
            ->join('sales', 'detail_sales.idVenta', '=', 'sales.id')
            ->join('products', 'raffles.idProducto', '=', 'products.id')
            ->join('states', 'sales.idEstado', '=', 'states.id')
            ->where('states.nombre', '=', 'pagado')
            ->where('sales.id', '=', auth()->user()->id)
            ->select('products.nombre', DB::raw("SUM(detail_sales.cantidad) as cantidad"), 'products.imagen', 'raffles.cantidadPart', 'raffles.fechaSorteo', 'raffles.id','raffles.link')
            ->groupBy('products.nombre', 'products.imagen', 'raffles.cantidadPart', 'raffles.fechaSorteo', 'raffles.id')
            ->get();

        // $cantPartActual = Product::join('raffles', 'products.id', '=', 'raffles.idProducto')
        // ->join('tickets', 'raffles.id', '=', 'tickets.idRifa')
        // ->where('products.nombre', '=', $sorteos->nombre)
        // ->select('tickets.idRifa')
        // ->get()ññ
        // ->count();
        return view('cliente.mis-sorteos', compact('sorteos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tickets = Raffle::join('detail_sales', 'raffles.id', '=', 'detail_sales.idRaffle')
        ->join('sales', 'detail_sales.idVenta', '=', 'sales.id')
        ->join('products', 'raffles.idProducto', '=', 'products.id')
        ->join('states', 'sales.idEstado', '=', 'states.id')
        ->join('tickets', 'raffles.id', '=', 'tickets.idRifa')
        ->where('raffles.id', '=', $id)
        ->where('states.nombre', '=', 'pagado')
        ->where('sales.id', '=', auth()->user()->id)
        ->select('tickets.nroTicket')
        ->get();

        return view('cliente/mis-tickets',compact('tickets'));
    }

    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
