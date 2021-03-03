@extends('layouts.admin')
@section('title','Gestión de ventas')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@role("Admin")
    @section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('ventas.create')}}">
        <span class="btn btn-primary">+ Registrar venta</span>
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
            Ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Ventas</h4>
                    </div>

                    <div class="table-responsive">
                        <table id="tablaListado" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventas as $venta)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('ventas.show', $venta)}}">{{$venta->id}}</a>
                                    </th>
                                    <td>
                                        {{\Carbon\Carbon::parse($venta->fecha_venta)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$venta->total}}</td>

                                    @if ($venta->estado == 'VALIDO')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.ventas', $venta)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.ventas', $venta)}}" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif

                                    <td style="width: 50px;">

                                        <a href="{{route('ventas.pdf', $venta)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('ventas.show', $venta)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                   
                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection