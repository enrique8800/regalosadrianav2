@extends('layouts.admin')
@section('title','Gestión de categorías')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@role('Admin')
    @section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('categorias.create')}}">
        <span class="btn btn-primary">+ Registrar categoria</span>
        </a>
    </li>
    @endsection
@endrole
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Categorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorías</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Categorías</h4>
                    </div>

                    <div class="table-responsive">
                        <table id="tablaListado" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    @role('Admin')
                                        <th>Acciones</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <th scope="row">{{$categoria->id}}</th>
                                    <td>
                                        <a href="{{route('categorias.show',$categoria)}}">{{$categoria->nombre}}</a>
                                    </td>
                                    <td>{{$categoria->descripcion}}</td>
                                    @role('Admin')
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['categorias.destroy',$categoria], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('categorias.edit', $categoria)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        {!! Form::close() !!}
                                        
                                    </td>
                                    @endrole
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-danger text-center -msg hola" id="message">
                        <strong>{{ session('message') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $(".hola").fadeOut(1500);
        },4000);
    });
</script>
@endsection