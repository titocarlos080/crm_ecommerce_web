<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
   
    use HasFactory;
    protected $table = 'pedido';
    protected $fillable = ['id', 'fecha', 'id_empresa','id_usuario','id_estado_pedido'];
    public $timestamps = false;

    public function productos(): BelongsToMany
    {
        return $this->belongsToMany(Producto::class, 'detalle_pedido', 'id_producto', 'id_pedido','cantidad','precio_parcial');
    } 
    public function estado_pedido(): BelongsTo
    {
        return $this->belongsTo(Pedido_Estado::class, 'id_estado_pedido');
    }
}
