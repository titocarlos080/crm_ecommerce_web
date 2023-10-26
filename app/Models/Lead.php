<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use HasFactory;
    protected $table = 'lead';
    protected $fillable = ['id', 'nombre', 'email', 'telefono', 'ganancia_esperada','id_empresa'];
    public $timestamps = false;
    public function actividades(): HasMany
    {
        return $this->hasMany(Actividad::class, 'id_lead');
    }
    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
