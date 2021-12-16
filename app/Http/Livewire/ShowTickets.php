<?php

namespace App\Http\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class ShowTickets extends Component
{
    public function render()
    {
        $raffle = Raffle::join('tickets', 'raffles.id', '=', 'tickets.idRifa')
        ->join('users', 'tickets.idUsuario', '=' ,'users.id')
        // ->where('raffles.id', '=', $id)
        ->select('tickets.*','users.*','raffles.*')
        ->get();

        return view('livewire.show-tickets', compact('raffle'));
    }
}
