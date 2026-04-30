<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $primaryKey = 'id_marca';

    protected $fillable = [
        'nombre',
        'pais_origen',
    ];

    public function camisetas(): HasMany
    {
        return $this->hasMany(Camiseta::class, 'id_marca', 'id_marca');
    }
}
