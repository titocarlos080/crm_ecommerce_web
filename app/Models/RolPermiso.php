<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPermiso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rol_permiso';
    protected $fillable = ['id_rol', 'id_permiso'];
    protected $primaryKey = ['id_rol', 'id_permiso'];


}
