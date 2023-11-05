<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursal';
    public $timestamps = false;
    protected $fillable = ['id', 'nombre', 'id_empresa'];
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
    public function categorias(): HasMany
    {
        return $this->hasMany(Categoria::class, 'id_sucursal');
    }
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'id_sucursal');
    }


}
/*CREATE TABLE sucursal (
	id serial PRIMARY KEY,
	nombre varchar(60),
	id_empresa int NOT NULL,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);*/