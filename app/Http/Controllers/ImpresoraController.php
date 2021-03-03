<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Impresora;
use App\Http\Requests\Impresora\UpdateRequest;

class ImpresoraController extends Controller
{
    public function index(){
        $impresora = Impresora::where('id', 1)->firstOrFail();
        return view('admin.impresora.index', compact('impresora'));
    }
    public function update(UpdateRequest $request, Impresora $impresora)
    {
        $impresora->update($request->all());
        return redirect()->route('impresoras.index');
    }
}
