<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'razon_social', 'calle', 'poblacion', 'cp', 'provincia', 'pais', 'telefono', 'email', 'fax'
    ];

    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function compras(){
        return $this->hasMany(Compra::class);
    }
}
