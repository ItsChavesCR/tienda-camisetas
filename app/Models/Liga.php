<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    protected $table = 'ligas';
    protected $primaryKey = 'id_liga';

    protected $fillable = [
        'nombre',
    ];

    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class, 'id_liga', 'id_liga');
    }
}
