<?php

namespace App\Http\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class ShowTickets extends Component
{
    public $search = '';

    public function mount($id){
        $this->id = $id;
    }

    public function render()
    {
        $raffle = Raffle::join('tickets', 'raffles.id', '=', 'tickets.idRifa')
        ->join('users', 'tickets.idUsuario', 'like' ,'users.id')
        ->where('tickets.nroTicket', 'like', '%'.$this->search.'%')
        ->select('tickets.*','users.*','raffles.*')
        ->get();

        return view('livewire.show-tickets', compact('raffle'));  
    }
}
