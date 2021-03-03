@extends('layouts.admin')
@section('title','Editar producto')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('productos.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de producto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de producto</h4>
                    </div>

                    {!! Form::model($producto,['route'=>['productos.update',$producto], 'method'=>'PUT','files' => true]) !!}


                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" name="nombre" id="nombre" value="{{$producto->nombre}}" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" value="{{$producto->descripcion}}" class="form-control" aria-describedby="helpId" required>
                      </div>

                    <div class="form-group">
                        <label for="codigo">Código de barras</label>
                        <input type="text" name="codigo" id="codigo" value="{{$producto->codigo}}" class="form-control">
                        <small id="helpId" class="text-muted">Campo opcional</small>
                    </div>

                    <div class="form-group">
                        <label for="precioVenta">Precio de venta</label>
                        <input type="number" name="precioVenta" id="precioVenta" step="0.01" value="{{$producto->precioVenta}}" class="form-control" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group">
                      <label for="categoria_id">Categoría</label>
                      <select class="form-control" name="categoria_id" id="categoria_id">
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}"
                            @if ($categoria->id == $producto->categoria_id)
                            selected
                            @endif
                            >{{$categoria->nombre}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select class="form-control" name="provider_id" id="provider_id">
                          @foreach ($providers as $provider)
                          <option value="{{$provider->id}}"
                            @if ($provider->id == $producto->provider_id)
                            selected
                            @endif
                            >{{$provider->razon_social}}</option>
                          @endforeach
                        </select>
                    </div>



                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="imagen" id="imagen" lang="es">
                        <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
                     <a href="{{route('productos.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/dropify.js') !!}
@endsection
