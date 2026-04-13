<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'ubicacion',
    ];

    public function ponentes(): HasMany
    {
        return $this->hasMany(Ponente::class);
    }

    public function asistentes(): HasMany
    {
        return $this->hasMany(Asistente::class);
    }
}
