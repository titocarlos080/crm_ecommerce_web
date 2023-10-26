<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tarea';
    public $timestamps = false;

    protected $fillable = ['id', 'contenido','finalizado' ,'id_grupo_usuario', 'id_actividad'];
    function activadad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class, 'id_actividad');
    }
    function grupo_usuario(): BelongsTo
    {
        return $this->belongsTo(GrupoUsuario::class, 'id_grupo_usuario');
    }
}
