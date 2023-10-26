<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EstadoActividad extends Model
{
    use HasFactory;
    protected $table = 'estado_actividad';
    public $timestamps = false;

    protected $fillable = ['id', 'nombre', 'id_empresa'];
    function actividad(): HasMany
    {
        return $this->hasMany(Actividad::class, 'id_estado');
    }
    function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
