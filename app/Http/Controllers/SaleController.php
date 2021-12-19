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
    public function __construct()
    {
        $this->middleware('cliente')->only('update');
        $this->middleware('admin')->only('index');
    }
    
    public function index()
    {
        $sales = sale::join('users', 'sales.idUsuario', '=', 'users.id')
        ->join('states','sales.idEstado', '=', 'states.id')
        ->select('sales.*','states.nombre as nombreEstado','users.nombre as nombreUsuario')
        ->get();
        return view('administracion/sales-index', compact('sales'));
    }

    public function show(Sale $sale)
    {
        //
    }

    public function update($id, Request $request)
    {
        $sale = Sale::findOrFail($id);
        // $sale->idEstado = '4';
        $sale->total = $request->total;
        $sale->update();

        $cupon = Sale::join('coupons', 'sales.idCupon', '=', 'coupons.id')
            ->where('sales.id', '=', $id)
            ->select('coupons.nombre', 'coupons.descuento')
            ->first();

        $user = User::findOrFail(auth()->user()->id);
        // $sale = Sale::findOrFail($id);
        // return $total;
        return view('cliente.formulario-venta', compact('user', 'sale', 'cupon'));
    }

    public function mis_compras(){
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
        ->select('products.imagen', 'products.nombre', 'raffles.fechaSorteo', 'raffles.precioTicket', 'raffles.link', 'detail_sales.precio', 'detail_sales.cantidad', 'detail_sales.id')
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
        return view('cliente.mis-compras', compact('rifasRev', 'rifasConf'));
    }

    public function state_update(Request $request, $id, SessionManager $sessionManager){
        // return $request;
        $request->validate([
            'nroOperacion' => 'required',
        ]);
        // return $request;
        if($request->nroOperacion == '' || $request->nroOperacion == null){
            $sessionManager->flash('mensaje', 'Tiene que ingresar un número de operación para continuar');
            return redirect()->back();
        }
        $sale = Sale::findOrFail($id);
        $nroOperacion_exist = Sale::where('nroOperacion', '=', $request->nroOperacion)
            ->first();
        //evaluar si el nro de operacion fue usado
        if($nroOperacion_exist != null){
            $sessionManager->flash('mensaje', 'Este número de operación ya fue usado');
            return redirect()->back();
        }else{
            $sale->idEstado = '5';
            $sale->nroOperacion = $request->nroOperacion;
            $sale->update();
        }
        
        return redirect(url('mis-compras'));
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

    public function metodos_pago(){
        $sale = Sale::join('states', 'sales.idEstado', '=', 'states.id')
            ->where('sales.idUsuario', '=', auth()->user()->id)
            ->where('states.nombre', 'like', 'pendiente')
            ->select('sales.id', 'sales.total')
            ->first();

        $cupon = Sale::join('coupons', 'sales.idCupon', '=', 'coupons.id')
        ->where('sales.id', '=', $sale->id)
        ->select('coupons.nombre', 'coupons.descuento')
        ->first();
        // return $cupon;
       return view('cliente.metodos-pago', compact('sale', 'cupon'));
    }
}
