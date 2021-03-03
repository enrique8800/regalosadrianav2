@extends('layouts.admin')
@section('title','Editar proveedor')
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
            Editar proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedor</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar proveedor</h4>
                    </div>
                    {!! Form::model($provider,['route'=>['providers.update',$provider], 'method'=>'PUT']) !!}
                    
                      <div class="form-group">
                        <label for="razon_social">Nombre</label>
                        <input type="text" name="razon_social" id="razon_social" value="{{$provider->razon_social}}" class="form-control" placeholder="Razón Social" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="calle">Calle</label>
                        <input type="text" name="calle" id="calle" value="{{$provider->calle}}" class="form-control" placeholder="calle">
                    </div>
                    
                    <div class="form-group">
                        <label for="poblacion">Poblacion</label>
                        <input type="text" name="poblacion" id="poblacion" value="{{$provider->poblacion}}" class="form-control" placeholder="poblacion">
                    </div>
                    
                    <div class="form-group">
                        <label for="cp">Código postal</label>
                        <input type="text" name="cp" id="cp" value="{{$provider->cp}}" class="form-control" placeholder="Codigo postal">
                    </div>
                    
                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <input type="text" name="provincia" id="provincia" value="{{$provider->provincia}}" class="form-control" placeholder="provincia">
                    </div>
                    
                    <div class="form-group">
                        <label for="pais">País</label>
                        <input type="text" name="pais" id="pais" value="{{$provider->pais}}" class="form-control" placeholder="pais">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" value="{{$provider->telefono}}" class="form-control" placeholder="telefono">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="{{$provider->email}}" class="form-control" placeholder="email">
                    </div>
                    
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" id="fax" value="{{$provider->fax}}" class="form-control" placeholder="fax">
                    </div>
                    

                     <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                     <a href="{{route('providers.index')}}" class="btn btn-light">
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
{!! Html::script('melody/js/data-table.js') !!}
@endsection