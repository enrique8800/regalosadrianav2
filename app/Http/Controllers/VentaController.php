<?php

namespace App\Http\Controllers;

use App\Venta;
use App\Producto;
use App\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\detallesVenta;
use App\Http\Requests\Venta\StoreRequest;
use App\Http\Requests\Venta\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
Use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class VentaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:ventas.create')->only(['create','store']);
        $this->middleware('can:ventas.index')->only(['index']);
        $this->middleware('can:ventas.show')->only(['show']);
    }
    public function index()
    {
        $ventas = Venta::get();
        return view('admin.venta.index', compact('ventas'));
    }
    public function create()
    {
        $clientes = Cliente::get();
        $productos = Producto::where('estado', 'ACTIVADO')->get();
        return view('admin.venta.create', compact('clientes','productos'));
    }
    public function store(StoreRequest $request)
    {
        $venta = Venta::create($request->all()+[
            'usuario_id'=>Auth::user()->id,
            'fecha_venta'=>Carbon::now('Europe/Madrid'),
        ]);
        foreach ($request->producto_id as $key => $producto) {
            $results[] = array("producto_id"=>$request->producto_id[$key], "cantidad"=>$request->cantidad[$key], "precio"=>$request->precio[$key], "descuento"=>$request->descuento[$key]);
        }
        $venta->detallesVenta()->createMany($results);
        return redirect()->route('ventas.index');
    }
    public function show(Venta $venta)
    {
        $subtotal = 0 ;
        $detallesVenta = $venta->detallesVenta;
        foreach ($detallesVenta as $detalleVenta) {
            $subtotal += $detalleVenta->cantidad * $detalleVenta->precio;
        }
        return view('admin.venta.show', compact('venta', 'detallesVenta', 'subtotal'));
    }

    public function change_status(Venta $venta)
    {
        
        if ($venta->estado == 'VALIDO') {
            // dd($venta);
            $venta->update(['estado'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $venta->update(['estado'=>'VALIDO']);
            return redirect()->back();
        } 
    }

    public function pdf(Venta $venta)
    {
        $subtotal = 0 ;
        $detallesVenta = $venta->detallesVenta;
        foreach ($detallesVenta as $detalleVenta) {
            $subtotal += $detalleVenta->cantidad*$detalleVenta->precio-$detalleVenta->cantidad* $detalleVenta->precio*$detalleVenta->descuento/100;
        }
        $pdf = PDF::loadView('admin.venta.pdf', compact('venta', 'subtotal', 'detallesVenta'));
        return $pdf->download('Reporte_de_venta_'.$venta->id.'.pdf');
    }

}
