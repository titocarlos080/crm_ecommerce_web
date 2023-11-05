<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'categoria';
    protected $fillable = ['id', 'nombre', 'id_sucursal', 'id_empresa'];
    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
    public function sucursal(): BelongsTo
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}

/*CREATE TABLE categoria (
	id serial PRIMARY KEY,
	nombre varchar(60),
	id_sucursal int NOT NULL,
	id_empresa int NOT NULL,
	FOREIGN KEY (id_sucursal) REFERENCES sucursal(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE

);*/
