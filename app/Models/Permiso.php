<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permiso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'permiso';
    protected $fillable = ['id', 'nombre'];

    public function grupos(): BelongsToMany {
        return $this->belongsToMany(Grupo::class, 'grupo_permiso', 'id_permiso', 'id_grupo');
    }


}
