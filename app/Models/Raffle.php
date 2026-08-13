<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Raffle extends Model
{

    protected static function booted()
    {
        static::deleting(function ($raffle) {

            if ($raffle->awards()->count() > 0) {
                throw new \Exception('No puedes eliminar este sorteo porque tiene premios asociados');
            }

        });
    }
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'sorteo_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function awards()
    {
        return $this->hasMany(Award::class, 'raffle_id');
    }
}
