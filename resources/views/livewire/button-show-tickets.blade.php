<div>
    <button type="submit" wire:click="changeState({{ $product->id }})" class="btn btn-danger">Ver Tickets</button>
    <a href="{{route('raffles.mostrar', $raffle->id)}}" class="btn btn-primary">Ver Tickets</a>                    
</div>
