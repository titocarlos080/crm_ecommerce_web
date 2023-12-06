<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Pedido extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detalle_pedido';
    protected $fillable = ['cantidad','precio_parcial','id_pedido', 'id_producto','id_empresa'];
    protected $primaryKey = ['id_pedido', 'id_producto'];


}
