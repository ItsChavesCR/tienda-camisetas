<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CamisetaTalla extends Model
{
    protected $table = 'camiseta_tallas';
    protected $primaryKey = 'id_camisa_talla';

    protected $fillable = [
        'id_camiseta',
        'id_talla',
    ];
}
