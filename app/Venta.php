<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'usuario_id', 'cliente_id', 'fecha_venta', 'impuesto', 'total', 'estado'
    ];

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function detallesVenta(){
        return $this->hasMany(detallesVenta::class);
    }

    public $timestamps=false;
}
