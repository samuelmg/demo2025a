<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mensaje extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'correo', 'mensaje'];
    // protected $guarded = ['id', 'created_at', 'updated_at'];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
