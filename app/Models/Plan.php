<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'plan';
    public $fillable = ['id', 'nombre', 'precio', 'logo','almacenamiento','ancho_de_banda','dominio','usuarios','soporte_por_correo','soporte_24x7'];
  
    public function empresas(): HasMany {
        return $this->hasMany(Empresa::class, 'id_plan');
        } 
}
