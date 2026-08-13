<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Winner extends Model
{
    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class);
    }

    public function tickets()
    {
        return $this->belongsToMany(
            Ticket::class,
            'ticket_winners', // tabla pivot
            'winner_id',     // FK en pivot hacia winners
            'ticket_id'      // FK en pivot hacia tickets
        );
    }
}
