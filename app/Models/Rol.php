<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rol extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rol';
    public $fillable= ['id','nombre'];
    public function usuarios(): HasMany {
    return $this->hasMany(Usuario::class, 'id_rol');
    }  
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
