@extends('layouts.admin')
@section('title','Gestión de empresa')
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
            Gestión de empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Gestión de empresa</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Gestión de empresa</h4>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong><i class="fas fa-file-signature mr-1"></i> Nombre </strong>

                    <p class="text-muted">
                        {{$empresa->nombre}}
                    </p>
                    <hr>
                    <strong><i class="fas fa-align-left mr-1"></i> Descripción</strong>

                    <p class="text-muted">
                        {{$empresa->descripcion}}
                    </p>
                    <hr>
                    <strong><i class="fas fa-map-marked-alt mr-1"></i> Dirección</strong>

                    <p class="text-muted">
                        {{$empresa->direccion}}
                    </p>
                    <hr>
                </div>
                <div class="form-group col-md-6">
                    <strong><i class="far fa-envelope mr-1"></i> Correo electrónico</strong>

                    <p class="text-muted">{{$empresa->email}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <strong><i class="fas fa-exclamation-circle mr-1"></i> Logo</strong><br>
                        </div>
                        <div class="col-md-6">
                            <img style="width:150px ; height:50px ;" src="{{asset('image/'.$empresa->logo)}}"
                                class="rounded float-left" alt="logo">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

        </div>
        @role('Admin')
        <div class="card-footer text-muted">

            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal-2">Actualizar</button>

        </div>
        @endrole
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


            {!! Form::model($empresa,['route'=>['empresas.update',$empresa], 'method'=>'PUT','files' => true]) !!}


            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{$empresa->nombre}}"
                        aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" name="descripcion" id="descripcion"
                        rows="3">{{$empresa->descripcion}}</textarea>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{$empresa->email}}"
                        aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="{{$empresa->direccion}}"
                        aria-describedby="helpId">
                </div>


                <div class="card-body">
                    <h5 class="card-title d-flex">Logo
                        <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                        </small>
                    </h5>
                    <input type="file" name="imagen" id="imagen" class="dropify" />
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