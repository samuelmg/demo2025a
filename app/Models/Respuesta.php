<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    /** @use HasFactory<\Database\Factories\RespuestaFactory> */
    use HasFactory;

    public function mensaje()
    {
        return $this->belongsTo(Mensaje::class);
    }
}
