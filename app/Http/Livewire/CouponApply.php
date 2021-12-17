<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Sale;
use GuzzleHttp\Psr7\Request;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class CouponApply extends Component
{
    // public function render()
    // {
    //     return view('livewire.coupon-apply');
    // }

    public function consultar_cupon(){
        // $cupon = Coupon::where('nombre', '=', $request->nombre)
        //     ->first();
        
        // if($cupon == null){
            session()->flash('mensaje', 'El cupón no existe');

        // }

        // $cupon_venta = Sale::findOrFail($request->idVenta);

        // if($cupon_venta->idCupon == null){
        //     $cupon_venta->idCupon = $cupon->id;
        //     $cupon_venta->save();
        //     session()->flash('mensaje', 'El cupón se aplicón correctamente');
        // }

        // if($cupon_venta->idCupon == $cupon->idCupon){
        //     session()->flash('mensaje', 'El cupón ya fue usado');
        // }
    }
}
