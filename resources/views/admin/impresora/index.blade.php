@extends('layouts.admin')
@section('title','Configuración de impresora')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Configuración de impresora
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Configuración de impresora</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Configuración de impresora</h4>

            </div>

            <div class="form-group">
                <strong><i class="fas fa-file-signature mr-1"></i> Nombre </strong>

                <p class="text-muted">
                    {{$impresora->nombre}}
                </p>
                <hr>
            </div>


        </div>
        @role('Admin')
        <div class="card-footer text-muted">

            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#exampleModal-2">Actualizar</button>

        </div>
        @role('Admin')
    </div>
</div>
</div>
</div>


<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::model($impresora,['route'=>['impresoras.update',$impresora], 'method'=>'PUT','files' => true]) !!}


            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{$impresora->nombre}}"
                        aria-describedby="helpId">
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>

        {!! Form::close() !!}

        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}
@endsection