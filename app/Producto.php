<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{

    protected $fillable = [
        'nombre',
        'codigo',
        'stock',
        'descripcion',
        'imagen',
        'precioVenta',
        'estado',
        'categoria_id',
        'provider_id'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function detallesCompra(){
        return $this->HasMany(DetallesCompra::class);
    }
    public function detallesVenta(){
        return $this->HasMany(detallesVenta::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
