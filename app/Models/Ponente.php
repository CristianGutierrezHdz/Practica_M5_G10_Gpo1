<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Ponente extends Model
{    
    protected $table = 'ponentes';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'especialidad',
        'evento_id',
    ];

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}
