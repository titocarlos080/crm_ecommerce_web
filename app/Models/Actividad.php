<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividad';
    public $timestamps = false;

    protected $fillable = ['id', 'titulo', 'id_estado', 'fecha_inicio', 'fecha_fin', 'id_grupo', 'id_lead', 'id_empresa'];

    public   function estado(): BelongsTo
    {
        return $this->belongsTo(EstadoActividad::class, 'id_estado');
    }
    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class, 'id_lead');
    }
    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
    public function tarea(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_actividad');
    }
}
