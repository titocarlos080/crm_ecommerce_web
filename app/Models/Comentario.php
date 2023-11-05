<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'comentarios';
    protected $fillable = ['id', 'nombre', 'id_usuario', 'id_producto', 'id_empresa'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
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
CREATE TABLE comentarios (
	id serial PRIMARY KEY,
  	comentario varchar(60) NOT NULL, 
  	id_usuario int NOT NULL,
  	id_producto int NOT NULL,
	id_empresa int NOT NULL,
  	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE,
  	FOREIGN KEY (id_producto) REFERENCES producto(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_empresa) REFERENCES empresa(id) ON DELETE CASCADE ON UPDATE CASCADE
);
*/