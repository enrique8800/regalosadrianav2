<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\Producto\StoreRequest;
use App\Http\Requests\Producto\UpdateRequest;
use Barryvdh\DomPDF\Facade as PDF;

class ProductoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:productos.create')->only(['create','store']);
        $this->middleware('can:productos.index')->only(['index']);
        $this->middleware('can:productos.edit')->only(['edit','update']);
        $this->middleware('can:productos.show')->only(['show']);
        $this->middleware('can:productos.destroy')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::get();
        $categorias = Categoria::get();
        return view('admin.productos.create', compact('providers', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
            $producto = Producto::create($request->all());
            $producto->update(['imagen'=>$image_name]);
        if ($request->codigo == "") {
            $numero = $producto->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $producto->update(['codigo'=>$numeroConCeros]);
        }
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $providers = Provider::get();
        $categorias = Categoria::get();
        return view('admin.productos.edit', compact('producto', 'providers', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Producto $producto, UpdateRequest $request)
    {
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
            $producto->update($request->all());
            $producto->update(['imagen'=>$image_name]);
            
        }else{
            $producto->update($request->all());
        }

        if ($request->codigo == "") {
            $numero = $producto->id;
            $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
            $producto->update(['codigo'=>$numeroConCeros]);
        }
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto_encontrado = Producto::query()->where('id', '=', $producto->id)->whereDoesntHave('detallesCompra')->whereDoesntHave('detallesVenta')->first();
        
        if(!is_null($producto_encontrado)){
            $producto_encontrado->delete();
            return redirect()->route('productos.index');
        }else{
            $productos = Producto::get();
            return redirect()->route('productos.index')
            ->with('type_message', "danger")
            ->with('message', trans('Este producto no se puede borrar porque ya está vinculado a compras o ventas'));
            ;
        }
        
        
    }
    public function change_status(Producto $producto)
    {
        if ($producto->estado == 'ACTIVADO') {
            $producto->update(['estado'=>'DESACTIVADO']);
            return redirect()->back();
        } else {
            $producto->update(['estado'=>'ACTIVADO']);
            return redirect()->back();
        } 
    }

    public function get_products_by_barcode(Request $request){
        if ($request->ajax()) {
            $productos = Producto::where('codigo', $request->codigo)->firstOrFail();
            return response()->json($productos);
        }
    }
    public function get_products_by_id(Request $request){
        if ($request->ajax()) {
            $productos = Producto::findOrFail($request->producto_id);
            return response()->json($productos);
        }
    }

    public function imprimir_codigo()
    {
        $productos = Producto::get();
        $pdf = PDF::loadView('admin.productos.codigo', compact('productos'));
        return $pdf->download('codigos_de_barras.pdf');
    }
}
