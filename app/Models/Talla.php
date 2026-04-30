<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = 'tallas';
    protected $primaryKey = 'id_talla';

    protected $fillable = [
        'codigo',
        'descripcion',
    ];

    public function camisetas(): BelongsToMany
    {
        return $this->belongsToMany(
            Camiseta::class,
            'camiseta_tallas',
            'id_talla',
            'id_camiseta',
            'id_talla',
            'id_camiseta'
        )->withTimestamps();
    }
}
