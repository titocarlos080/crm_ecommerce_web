<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GrupoUsuario extends Model
{
    use HasFactory;

    protected $table = 'grupo_usuario';
    protected $fillable = ['id', 'id_usuario', 'id_grupo'];
    public $timestamps = false;

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    public  function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }
    public function tarea(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_grupo_usuario');
    }
    
}
