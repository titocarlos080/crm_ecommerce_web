<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupo';
    protected $fillable = ['id', 'nombre', 'id_empresa'];
    public $timestamps = false;

    public function grupo_usuario(): HasMany
    {
        return $this->hasMany(GrupoUsuario::class, 'id_grupo');
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
    public function permisos(): BelongsToMany
    {
        return $this->belongsToMany(Permiso::class, 'grupo_permiso', 'id_grupo', 'id_permiso');
    }
}
