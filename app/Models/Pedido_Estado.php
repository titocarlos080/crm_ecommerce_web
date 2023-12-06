<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pedido_Estado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'estado_pedido';
    public $fillable= ['id','nombre'];
    public function pedidos(): HasMany {
    return $this->hasMany(Pedido::class, 'id_estado_pedido');
    }  
    

}
