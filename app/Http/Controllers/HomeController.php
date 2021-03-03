<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comprasdia=DB::select('SELECT DATE_FORMAT(c.fecha_compra,"%d/%m/%Y") as dia, sum(c.total) as totaldia from compras c where c.estado="VALIDO" group by c.fecha_compra order by day(c.fecha_compra) asc limit 15');

        $ventasdia=DB::select('SELECT DATE_FORMAT(v.fecha_venta,"%d/%m/%Y") as dia, sum(v.total) as totaldia from ventas v where v.estado="VALIDO" group by v.fecha_venta order by day(v.fecha_venta) asc limit 15');
        
        $productosvendidos=DB::select('SELECT p.codigo as codigo, 
        sum(dv.cantidad) as cantidad, p.nombre as nombre , p.id as id , p.stock as stock from productos p 
        inner join detalles_ventas dv on p.id=dv.producto_id 
        inner join ventas v on dv.venta_id=v.id where v.estado="VALIDO" 
        and year(v.fecha_venta)=year(curdate()) 
        group by p.codigo ,p.nombre, p.id , p.stock order by sum(dv.cantidad) desc limit 5');
       
       
        return view('home', compact( 'comprasdia', 'ventasdia',  'productosvendidos'));
    }
}
