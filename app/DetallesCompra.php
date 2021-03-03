<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallesCompra extends Model
{
    protected $fillable = [
        'compra_id', 'producto_id', 'cantidad', 'precio'
    ];

    public function compras(){
        return $this->belongsTo(Compra::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

}
