<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'producto';
    protected $fillable = ['id', 'nombre', 'imagen', 'descripcion', 'stock', 'costo', 'precio', 'id_categoria', 'id_sucursal', 'id_empresa'];


    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
    public function sucursal(): BelongsTo
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }
    public function calificaciones(): HasMany
    {
        return $this->hasMany(Calificacion::class, 'id_producto');
    }
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'id_producto');
    }

    public function pedidos(): BelongsToMany
    {
        return $this->belongsToMany(Pedido::class, 'detalle_pedido', 'id_producto', 'id_pedido','cantidad','precio_parcial');
    }

}


/*
 
CREATE TABLE producto (
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL,
  	imagen varchar(100),
  	descripcion varchar(200),
	stock decimal NOT NULL check(stock >= 0),
	costo real NOT NULL,
	precio real NOT NULL,
  	id_categoria int NOT NULL,
  	id_sucursal int NOT NULL,
	id_empresa int NOT NULL,
  	FOREIGN KEY (id_categoria) REFERENCES categoria(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_sucursal) REFERENCES sucursal(id) ON DELETE CASCADE ON UPDATE CASCADE,
   	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);

*/