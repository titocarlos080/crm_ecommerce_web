<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'usuario';
    protected $fillable = ['id', 'nombre', 'email', 'foto', 'telefono', 'password', 'id_rol', 'id_empresa'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function direccion(): HasMany
    {
        return $this->hasMany(Direccion::class, 'id_usuario');
    }
    public function tarea(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_usuario');
    }
    public function pedidos(): HasMany
    {
        return $this->hasMany(Pedido::class, 'id_pedido');
    }
    public function grupo_usuario(): HasMany
    {
        return $this->hasMany(GrupoUsuario::class, 'id_usuario');
    }
    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
