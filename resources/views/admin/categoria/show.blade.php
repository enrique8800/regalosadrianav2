@extends('layouts.admin')
@section('title','Productos de categoría')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>
@endsection

@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('imprimir_codigo')}}">
        <span class="btn btn-primary">Descargar códigos de barra</span>
        </a>
    </li>
@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Productos que pertenecen a {{$categoria->nombre}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categorias.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$categoria->nombre}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos de la categoría {{$categoria->nombre}}</h4>

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
                                    @role("Admin")
                                    <th>Acciones</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoria->productos as $producto)
                                <tr>
                                    <th scope="row">{{$producto->id}}</th>
                                    <td>
                                        <a href="{{route('productos.show',$producto)}}">{{$producto->nombre}}</a>
                                    </td>
                                    <td>{{$producto->stock}}</td>
                                    @if ($producto->estado == 'ACTIVADO')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.productos', $producto)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.products', $producto)}}" title="Editar">
                                            Desactivado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    

                                    <td>{{$producto->categoria->nombre}}</td>
                                    @role("Admin")
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
                <div class="card-footer text-muted">
                    <a href="{{route('categorias.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection