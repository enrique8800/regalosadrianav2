<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\Cliente\StoreRequest;
use App\Http\Requests\Cliente\UpdateRequest;

class ClienteController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:clientes.create')->only(['create','store']);
        $this->middleware('can:clientes.index')->only(['index']);
        $this->middleware('can:clientes.edit')->only(['edit','update']);
        $this->middleware('can:clientes.show')->only(['show']);
        $this->middleware('can:clientes.destroy')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();
        return view('admin.cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        
        $totalCompras = 0;
        foreach ($cliente->ventas as $key =>  $venta) {
            $totalCompras+=$venta->total;
        }
        return view('admin.cliente.show', compact('cliente', 'totalCompras'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('admin.cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente_encontrado = Cliente::query()->where('id', '=', $cliente->id)->whereDoesntHave('ventas')->first();
        
        if(!is_null($cliente_encontrado)){
            $cliente_encontrado->delete();
            return redirect()->route('clientes.index');
        }else{
            $clientes = Cliente::get();
            return redirect()->route('clientes.index')
            ->with('type_message', "danger")
            ->with('message', trans('Este cliente no se puede borrar porque ya que está vinculado a una o varias ventas'));
            ;
        }
    }
}
