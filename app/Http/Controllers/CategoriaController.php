<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\Categoria\StoreRequest;
use App\Http\Requests\Categoria\UpdateRequest;


class CategoriaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:categorias.create')->only(['create','store']);
        $this->middleware('can:categorias.index')->only(['index']);
        $this->middleware('can:categorias.edit')->only(['edit','update']);
        $this->middleware('can:categorias.show')->only(['show']);
        $this->middleware('can:categorias.destroy')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();
        return view('admin.categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('admin.categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('admin.categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria_encontrada = Categoria::query()->where('id', '=', $categoria->id)->whereDoesntHave('productos')->first();
        
        if(!is_null($categoria_encontrada)){
            $categoria_encontrada->delete();
            return redirect()->route('categorias.index');
        }else{
            $categorias = Categoria::get();
            return redirect()->route('categorias.index')
            ->with('type_message', "danger")
            ->with('message', trans('Esta categoria no se puede borrar porque ya está vinculada a uno o varios productos'));
            ;
        }
    }
}
