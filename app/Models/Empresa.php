<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresa extends Model
{
    use HasFactory;
    use HasFactory;

    public $timestamps = false;
    protected $table = 'empresa';
 
    public $fillable = ['id', 'nombre', 'email', 'descripcion','logo','dominio','stripe_key','stripe_secret', 'id_plan'];
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'id_plan');
    }
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'id_empresa');
    }
    public function quejas(): HasMany
    {
        return $this->hasMany(Queja::class, 'id_empresa');
    }
    public function historial(): HasMany
    {
        return $this->hasMany(Usuario::class, 'id_empresa');
    }
    public function direccion(): HasMany
    {
        return $this->hasMany(Direccion::class, 'id_empresa');
    }
    public function leads(): HasMany
    {
        return $this->hasMany(leads::class, 'id_empresa');
    }
    public function actividad(): HasMany
    {
        return $this->hasMany(Actividad::class, 'id_empresa');
    }
    public function estados_actividad(): HasMany
    {
        return $this->hasMany(EstadoActividad::class, 'id_empresa');
    }
    public function categorias(): HasMany
    {
        return $this->hasMany(Categoria::class, 'id_empresa');
    }
    public function calificaciones(): HasMany
    {
        return $this->hasMany(Calificacion::class, 'id_empresa');
    }
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'id_empresa');
    }
    public function sucursales(): HasMany
    {
        return $this->hasMany(Sucursal::class, 'id_empresa');
    } public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class, 'id_empresa');
    }
}

/*CREATE TABLE empresa(
  id SERIAL NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  descripcion VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);*/