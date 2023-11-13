<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoPermiso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'grupo_permiso';
    protected $fillable = ['id_grupo', 'id_permiso'];
    protected $primaryKey = ['id_grupo', 'id_permiso'];


}
