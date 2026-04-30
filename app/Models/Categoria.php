<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function camisetas(): HasMany
    {
        return $this->hasMany(Camiseta::class, 'id_categoria', 'id_categoria');
    }
}
