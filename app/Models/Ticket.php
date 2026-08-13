<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'sorteo_id',
        'dni',
        'nombres',
        'apellidos',
        'telefono',
        'departamento',
        'comprobante',
        'aprobado',
        'cantidad',
        'email'
    ];

    public function getAprobadoBadgeAttribute()
    {
        if ($this->aprobado == 1) {
            return '<span class="badge badge-success">APROBADO</span>';
        }

        return '<span class="badge badge-danger">SIN APROBAR</span>';
    }

    public function sorteo()
    {
        return $this->belongsTo(Raffle::class, 'sorteo_id');
    }
}
