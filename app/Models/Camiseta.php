<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Camiseta extends Model
{
    protected $table = 'camisetas';
    protected $primaryKey = 'id_camiseta';

    protected $fillable = [
        'nombre',
        'descripcion',
        'version',
        'genero',
        'temporada',
        'precio',
        'material',
        'tipo_manga',
        'numero',
        'imagen_url',
        'id_categoria',
        'id_marca',
        'id_equipo',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
    }

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'id_equipo', 'id_equipo');
    }

    public function tallas(): BelongsToMany
    {
        return $this->belongsToMany(
            Talla::class,
            'camiseta_tallas',
            'id_camiseta',
            'id_talla',
            'id_camiseta',
            'id_talla'
        )->withTimestamps();
    }
}
