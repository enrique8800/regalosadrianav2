<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Provider;
use App\Producto;
use Carbon\Carbon;
use App\DetallesCompra;
use Illuminate\Http\Request;
use App\Http\Requests\Compra\StoreRequest;
use App\Http\Requests\Compra\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;


class CompraController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:compras.create')->only(['create','store']);
        $this->middleware('can:compras.index')->only(['index']);
        $this->middleware('can:compras.show')->only(['show']);

    }

    public function index()
    {
        $compras = Compra::get();
        return view('admin.compra.index', compact('compras'));
    }
    public function create()
    {
        $providers = Provider::get();
        $productos = Producto::where('estado', 'ACTIVADO')->get();
        return view('admin.compra.create', compact('providers','productos'));
    }
    public function store(StoreRequest $request)
    {
        $compra = Compra::create($request->all()+[
            'usuario_id'=>Auth::user()->id,
            'fecha_compra'=>Carbon::now('Europe/Madrid'),
        ]);
        foreach ($request->producto_id as $key => $producto) {
            $results[] = array("producto_id"=>$request->producto_id[$key], "cantidad"=>$request->cantidad[$key], "precio"=>$request->precio[$key]);
        }
        $compra->detallesCompra()->createMany($results);
        return redirect()->route('compras.index');
    }
    public function show(Compra $compra)
    {
        $subtotal = 0 ;
        $detallesCompra = $compra->detallesCompra;
        foreach ($detallesCompra as $detalleCompra) {
            $subtotal += $detalleCompra->cantidad * $detalleCompra->precio;
        }
        return view('admin.compra.show', compact('compra', 'detallesCompra', 'subtotal'));
    }

    public function change_status(Compra $compra)
    {
        if ($compra->estado == 'VALIDO') {
            $compra->update(['estado'=>'CANCELADO']);
            return redirect()->back();
        } else {
            $compra->update(['estado'=>'VALIDO']);
            return redirect()->back();
        } 
    }

    public function pdf(Compra $compra)
    {
        $subtotal = 0 ;
        $detallesCompra = $compra->detallesCompra;
        foreach ($detallesCompra as $detalleCompra) {
            $subtotal += $detalleCompra->cantidad * $detalleCompra->precio;
        }
        $pdf = PDF::loadView('admin.compra.pdf', compact('compra', 'subtotal', 'detallesCompra'));
        return $pdf->download('Reporte_de_compra_'.$compra->id.'.pdf');
    }
}
