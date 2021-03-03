<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'usuario_id', 'provider_id', 'fecha_compra', 'impuesto', 'total', 'estado'
    ];

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function detallesCompra(){
        return $this->hasMany(DetallesCompra::class);
    }
}
