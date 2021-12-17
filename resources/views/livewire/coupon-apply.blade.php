<div>
    <h4 class="third-color"><strong>RESUMENnnnnn</strong></h4>
    <hr class="linea third-color">
    <div class="row">
        <p class="col-12 col-md-6 font-color">Valor regular: </p>
        {{-- <p class="col-12 col-md-6 font-color">S/. {{number_format($sale->total, 2)}}</p> --}}
    </div>
    <div>
        <form wire:submit.prevent = 'consultar_cupon' method="post">
            @csrf
            <label for=""><strong>Cupón de descuento</strong></label>
            <input type="text" name="cupon" wire:model="cupon" class="form-control borde-input">
            <button type="submit" class="btn btn-primary my-1 px-4">Aplicar cupón</button>
        </form>
        @if (session()->has('mensaje'))
            <div class="text-danger">{{session('mensaje')}}</div>
        @endif
    </div>
    <hr class="linea third-color my-4">
    <div class="row">
        <p class="col-12 col-md-6 font-color">Total</p>
        {{-- <p class="col-12 col-md-6 font-color">S/. {{number_format($sale->total, 2)}}</p> --}}
    </div>
</div>
