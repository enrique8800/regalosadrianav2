@extends('layouts.admin')
@section('title','Editar cliente')
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
            Edición de cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clientes.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edición de cliente</h4>
                    </div>

                    {!! Form::model($cliente,['route'=>['clientes.update',$cliente], 'method'=>'PUT']) !!}


                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text"
                        class="form-control" name="nombre" id="nombre" value="{{$cliente->nombre}}" aria-describedby="helpId" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text"
                          class="form-control" name="dni" id="dni" value="{{$cliente->dni}}" aria-describedby="helpId" required>
                    </div>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text"
                          class="form-control" name="direccion" id="direccion" value="{{$cliente->direccion}}" aria-describedby="helpId">
                          <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text"
                          class="form-control" name="telefono" id="telefono" value="{{$cliente->telefono}}" aria-describedby="helpId">
                          <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email"
                          class="form-control" name="email" id="email" value="{{$cliente->email}}" aria-describedby="helpId">
                          <small id="helpId" class="form-text text-muted">Este campo es opcional.</small>
                    </div>
                    

                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
                     <a href="{{route('clientes.index')}}" class="btn btn-light">
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