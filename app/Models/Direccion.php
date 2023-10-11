<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Direccion extends Model
{
    use HasFactory;
     public $timestamps = false;
    protected $table = 'direccion';
    public $fillable= ['id','ciudad','calle','numero','id_usuario'];
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_usuario');
    }
}
/*
CREATE TABLE direccion(
	id serial NOT NULL PRIMARY KEY,
	ciudad varchar(60) ,
	calle varchar(60) ,
	numero int not null,
	id_usuario int NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE
);
*/