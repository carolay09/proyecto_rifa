<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ticket::join('users','tickets.idUsuario','=','users.id')
        ->select('tickets.nroTicket', 'users.dni','users.nombre','users.apellido','users.telefono','users.direccion','users.email')
        ->get();
    }
}
