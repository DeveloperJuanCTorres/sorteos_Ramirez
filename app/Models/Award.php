<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Award extends Model
{
    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }
}
