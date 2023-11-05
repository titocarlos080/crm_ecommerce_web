<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calificacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'calificacion';
    protected $fillable = ['id', 'nombre', 'id_producto', 'id_empresa'];

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
/*  
CREATE TABLE calificacion (
	id serial PRIMARY KEY,
  	voto varchar(60) NOT NULL, 
  	id_producto int NOT NULL,
	id_empresa int NOT NULL,
  	FOREIGN KEY (id_producto) REFERENCES producto(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE

);*/