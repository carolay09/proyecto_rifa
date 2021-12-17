<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class CouponController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    }

    public function index()
    {
        $coupons = Coupon::all();

        return view('administracion.coupons-index', compact('coupons'));
    }

    public function create()
    {
        return view('administracion.coupons-create');
    }

    public function store(Request $request)
    {
        $coupon = new Coupon;
        $coupon->nombre = $request->nombre;
        $coupon->cantidad = $request->cantidad;
        // $coupon->fechaExp = $request->fechaExp;
        $coupon->descuento = $request->descuento;
        $coupon->idEstado = '13';
        $coupon->save();

        return redirect('coupons');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function consultar_cupon(Request $request, SessionManager $sessionManager){
        $cupon = Coupon::where('nombre', '=', $request->nombre)
            ->first();
        
        if($cupon == null){
            $sessionManager->flash('mensaje', 'El cupón no existe');

            return redirect('detail_sales');
        }

        $cupon_user = Coupon::join('sales', 'coupons.id', '=', 'sales.idCupon')
            ->where('sales.idUsuario', '=', auth()->user()->id)
            ->where('coupons.nombre', '=', $request->nombre)
            ->select('coupons.id')
            ->first();

        if($cupon_user != null){
            $sessionManager->flash('mensaje', 'Este cupón ya fue usado');
            return redirect('detail_sales');
        }
        else{
            if($cupon->cantidad <= 0){
                $sessionManager->flash('mensaje', 'Ya no quedan cupones disponibles');
                return redirect('detail_sales');
            }else{
                $sale = Sale::findOrFail($request->idVenta);
                $sale->idCupon = $cupon->id;
                $sale->update();

                $cupon->cantidad -= 1;
                $cupon->update();

                $sessionManager->flash('mensaje', 'El cupón se aplicó correctamente');
                return redirect('detail_sales');
            }
        }
        // $cupon_venta = Sale::findOrFail($request->idVenta);

        // if($cupon_venta->idCupon == null){
        //     $cupon_venta->idCupon = $cupon->id;
        //     $cupon_venta->save();
        //     $sessionManager->flash('mensaje', 'El cupón se aplicón correctamente');

        //     return redirect('detail_sales');
        // }

        // if($cupon_venta->idCupon == $cupon->idCupon){
        //     $sessionManager->flash('mensaje', 'El cupón ya fue usado');

        //     return redirect('detail_sales');
        // }
    }
}
