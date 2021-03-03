<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detallesVenta extends Model
{
    protected $fillable = [
        'venta_id', 'producto_id', 'cantidad', 'precio', 'descuento'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function ventas(){
        return $this->belongsTo(Venta::class);
    }
}
