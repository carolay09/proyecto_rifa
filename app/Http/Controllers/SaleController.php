<?php

namespace App\Http\Controllers;

use App\Models\DetailSale;
use App\Models\Raffle;
use App\Models\Sale;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = sale::join('users', 'sales.idUsuario', '=', 'users.id')
        ->join('states','sales.idEstado', '=', 'states.id')
        ->select('sales.*','states.nombre as nombreEstado','users.nombre as nombreUsuario')
        ->get();
        return view('administracion/sales-index', compact('sales'));
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
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $sale = Sale::findOrFail($id);
        // $sale->idEstado = '4';
        $sale->total = $request->total;
        $sale->update();

        $user = User::findOrFail(auth()->user()->id);
        // $sale = Sale::findOrFail($id);
        $total = $sale->total;
        // return $total;
        return view('cliente.formulario-venta', compact('user', 'total'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function mis_sorteos(){
        $id_user = auth()->user()->id;

        // $rifasEsp = Sale::join('detail_sales', 'detail_sales.idVenta', '=', 'sales.id')
        // ->join('raffles', 'detail_sales.idRaffle', '=', 'raffles.id')
        // // ->join('products', 'raffles.idProducto', '=', 'products.id')
        // ->where('sales.idUsuario', '=', $id_user)
        // ->where('sales.idEstado', '=', '4')
        // ->select('sales.total', 'sales.id')
        // ->groupBy('sales.id')
        // ->get();

        $rifasRev = DetailSale::join('sales', 'detail_sales.idVenta', '=', 'sales.id')
        ->join('raffles', 'detail_sales.idRaffle', '=', 'raffles.id')
        ->join('products', 'raffles.idProducto', '=', 'products.id')
        ->where('sales.idUsuario', '=', $id_user)
        ->where('sales.idEstado', '=', '5')
        ->select('products.imagen', 'products.nombre', 'raffles.precioTicket', 'sales.idEstado', 'raffles.fechaSorteo')
        ->get();

        $rifasConf = DetailSale::join('sales', 'detail_sales.idVenta', '=', 'sales.id')
        ->join('raffles', 'detail_sales.idRaffle', '=', 'raffles.id')
        ->join('products', 'raffles.idProducto', '=', 'products.id')
        ->where('sales.idUsuario', '=', $id_user)
        ->where('sales.idEstado', '=', '7')
        ->select('products.imagen', 'products.nombre', 'raffles.fechaSorteo', 'raffles.precioTicket', 'detail_sales.precio', 'detail_sales.cantidad', 'detail_sales.id')
        ->get();

        // $rifasObs = DetailSale::join('sales', 'detail_sales.idVenta', '=', 'sales.id')
        // ->join('raffles', 'detail_sales.idRaffle', '=', 'raffles.id')
        // ->join('products', 'raffles.idProducto', '=', 'products.id')
        // ->where('sales.idUsuario', '=', $id_user)
        // ->where('sales.idEstado', '=', '6')
        // ->select('products.nombre', 'raffles.fechaSorteo', 'raffles.precioTicket', 'detail_sales.precio', 'detail_sales.cantidad', 'detail_sales.id')
        // ->get();
        // return $rifasRev;
        // return view('cliente.mis-sorteos', compact('rifasEsp', 'rifasConf', 'rifasObs', 'rifasRev'));
        return view('cliente.mis-sorteos', compact('rifasRev', 'rifasConf'));
    }

    public function state_update(Request $request, $id, SessionManager $sessionManager){
        $sale = Sale::findOrFail($id);
        $nroOperacion_exist = Sale::where('nroOperacion', '=', $request->nroOperacion)
            ->first();
        //evaluar si el nro de operacion fue usado
        if($nroOperacion_exist != null){
            $sessionManager->flash('mensaje', 'Este número de operación ya fue usado');

            return view('cliente.metodos-pago', compact('sale'));
        }else{
            $sale->idEstado = '5';
            $sale->nroOperacion = $request->nroOperacion;
            $sale->update();
        }

        return redirect('mis-sorteos');
        // return $sale;
    }

    public function rifas_admin(){
        $rifasPend = Sale::where('idEstado', '=', '5')
            ->get();

        return view('administracion.revision-rifas', compact('rifasPend'));
    }

    public function confirma_pago(Request $request, $id){
        $sale = Sale::findOrFail($id);
        $idUsuario = $request->idUsuario;

        $tickets = Sale::join('detail_sales', 'sales.id', '=', 'detail_sales.idVenta')
            ->where('sales.idUsuario', '=', $idUsuario)
            ->where('sales.id', '=', $sale->id)
            ->where('sales.idEstado', '=', '5')
            ->select('detail_sales.cantidad', 'detail_sales.idRaffle')
            ->get();

        foreach($tickets as $ticket){
            $cantidad = $ticket->cantidad;
            $idRifa = $ticket->idRaffle;

            $codigo = Raffle::join('products', 'raffles.idProducto', '=', 'products.id')
                ->where('raffles.id', '=', $idRifa)
                ->select('products.id', 'products.idCategoria')
                ->first();

            $nroTicket = "T".$codigo->idCategoria.$codigo->id;

            for ($i=0; $i < $cantidad; $i++) { 
                $ticket2 = new Ticket;
                $ticket2->idUsuario = auth()->user()->id;
                $ticket2->idRifa = $idRifa;
                $idTicket = Ticket::select('id')->max('id') + 1;
                if($idTicket == null){
                    $idTicket = 1;
                }
                $ticket2->nroTicket = $nroTicket.$idTicket;
                $ticket2->save();
            }
        }
        $sale->idEstado = '7';
        $sale->update();
            
        return redirect('dashboard/ventas/revision');
    }

    public function observa_pago($id){
        $sale = Sale::findOrFail($id);
        $sale->idEstado = '6';
        $sale->update();

        return redirect('dashboard/ventas/revision');
    }

    public function mostrar($id){
        $sale = Sale::join('detail_sales', 'sales.id', '=', 'detail_sales.idVenta')
        ->where('sales.id', '=', $id)
        ->select('detail_sales.*')
        ->get();


        return view('administracion/detail_sales', compact('sale'));
    }
}
