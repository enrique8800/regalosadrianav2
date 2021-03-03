<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    protected $fillable = [
        'nombre',
        'dni',
        'direccion',
        'telefono',
        'email'
    ];

    public function ventas(){
        return $this->hasMany(Venta::class);
    }
}
