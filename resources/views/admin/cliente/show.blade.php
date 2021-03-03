@extends('layouts.admin')
@section('title','información del cliente')
@section('styles')

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$cliente->nombre}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clientes.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$cliente->nombre}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$cliente->nombre}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                        Sobre cliente
                                    </a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                                        Historial de compras
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">




                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" user="tabpanel"
                                    aria-labelledby="list-home-list">

                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Información de cliente</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            
                                            <div class="form-group col-md-6">
                                                <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                                <p class="text-muted">
                                                    {{$cliente->nombre}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-address-card mr-1"></i> DNI</strong>
                                                <p class="text-muted">
                                                    {{$cliente->dni}}
                                                </p>
                                                <hr>
                                            </div>
        
                                            <div class="form-group col-md-6">
                                                <strong>
                                                    <i class="fas fa-mobile mr-1"></i>
                                                    Dirección</strong>
                                                <p class="text-muted">
                                                    {{$cliente->direccion}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-envelope mr-1"></i> Teléfono</strong>
                                                <p class="text-muted">
                                                    {{$cliente->telefono}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-map-marked-alt mr-1"></i> Correo electrónico</strong>
                                                <p class="text-muted">
                                                    {{$cliente->email}}
                                                </p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="tab-pane fade" id="list-profile" user="tabpanel"
                                    aria-labelledby="list-profile-list">


                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Historial de compras</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
    
                                            <div class="table-responsive">
                                                <table class="table">
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
                                                        @foreach ($cliente->ventas as $venta)
                                                        <tr>
                                                            <th scope="row">
                                                                <a href="{{route('ventas.show', $venta)}}">{{$venta->id}}</a>
                                                            </th>
                                                            <td>{{$venta->fecha_compra}}</td>
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
                                                    <tfoot>
                                                        <tr>
                                                          <td colspan="2"><strong>Total compras: </strong></td>
                                                          <td colspan="3" align="left"><strong>{{$totalCompras}}</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
    
                                        </div>
                                    </div>

                                </div>
                            </div>





                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('clientes.index')}}" class="btn btn-primary float-right">Regresar</a>
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