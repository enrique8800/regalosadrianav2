<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'razon_social', 'calle', 'poblacion', 'cp', 'provincia', 'pais', 'telefono', 'email', 'fax'
    ];

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
