<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'nombre',
        'id_liga',
    ];

    public function liga(): BelongsTo
    {
        return $this->belongsTo(Liga::class, 'id_liga', 'id_liga');
    }

    public function camisetas(): HasMany
    {
        return $this->hasMany(Camiseta::class, 'id_equipo', 'id_equipo');
    }
}
