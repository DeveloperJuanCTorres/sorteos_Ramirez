<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;

class TicketsExport implements FromCollection
{
    protected $raffle_id;

    public function __construct($raffle_id)
    {
        $this->raffle_id = $raffle_id;
    }

    public function collection()
    {
        $tickets = Ticket::where('sorteo_id', $this->raffle_id)
            ->where('aprobado', 1)
            ->get();

        $resultado = collect();

        foreach ($tickets as $t) {
            for ($i = 0; $i < $t->cantidad; $i++) {
                $resultado->push([
                    'ticket'    => $t->id . '-' . ($i + 1),
                    'dni'       => $t->dni,
                    'nombres'   => $t->nombres,
                    'apellidos' => $t->apellidos,
                ]);
            }
        }

        return $resultado;
    }

    // public function collection()
    // {
    //     return Ticket::where('sorteo_id', $this->raffle_id)
    //         ->where('aprobado', 1)
    //         ->get(['id','dni','nombres','apellidos']);
    // }
}
