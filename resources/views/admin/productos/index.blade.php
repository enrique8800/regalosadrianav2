@extends('layouts.admin')
@section('title','Gestión de productos')
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
        <a class="nav-link" href="{{route('productos.create')}}">
        <span class="btn btn-primary">+ Registrar producto</span>
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
            Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>
                    </div>

                    <div class="table-responsive">
                        <table id="tablaListado" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    @role('Admin')
                                    <th>Acciones</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{$producto->id}}</th>
                                    <td>
                                        <a href="{{route('productos.show',$producto)}}">{{$producto->nombre}}</a>
                                    </td>
                                    <td>{{$producto->stock}}</td>
                                    <td>{{$producto->estado}}</td>
                                    

                                    <td>{{$producto->categoria->nombre}}</td>
                                    @role('Admin')
                                        <td style="width: 50px;">
                                            {!! Form::open(['route'=>['productos.destroy',$producto], 'method'=>'DELETE']) !!}
                                            <a class="jsgrid-button jsgrid-edit-button" href="{{route('productos.edit', $producto)}}" title="Editar">
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