<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Http\Requests\Empresa\UpdateRequest;

class EmpresaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:empresas.index')->only(['index']);
        $this->middleware('can:empresas.update')->only(['edit','update']);
    }
    public function index(){
        $empresa = Empresa::where('id', 1)->firstOrFail();
        return view('admin.empresa.index', compact('empresa'));
    }
    public function update(UpdateRequest $request, Empresa $empresa)
    {
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
            $empresa->update($request->all());
            $empresa->update(['logo'=>$image_name]);
        }else{
            $empresa->update($request->all());
        }

        

        return redirect()->route('empresas.index');
    }
}
