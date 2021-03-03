@extends('layouts.admin')
@section('title','información de producto')
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
            {{$producto->nombre}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('productos.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$producto->nombre}}</li>
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

                                <img src="{{asset('image/'.$producto->imagen)}}" alt="profile" class="img-lg  mb-3" />


                                <h3>{{$producto->nombre}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Estado
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$producto->estado}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="{{route('providers.show', $producto->provider_id)}}">
                                        {{$producto->provider->razon_social}}
                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoría
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="{{route('categorias.show', $producto->categoria_id)}}">
                                            {{$producto->categoria->nombre}}
                                        </a>
                                    </span>
                                </p>
                            </div>

                            @if ($producto->estado == 'ACTIVADO')
                            <a href="{{route('change.status.productos', $producto)}}" class="btn btn-success btn-block">Activo</a>
                            @else
                            <a href="{{route('change.status.productos', $producto)}}" class="btn btn-danger btn-block">Desactivado</a>
                            @endif
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Código</strong>
                                        <p class="text-muted">
                                            {{$producto->codigo}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Stock</strong>
                                        <p class="text-muted">
                                            {{$producto->stock}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-money-bill mr-1"></i>
                                            Precio de venta</strong>
                                        <p class="text-muted">
                                            {{$producto->precioVenta}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i> Código de barras</strong>
                                        <p class="text-muted">
                                            @php
                                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                            @endphp
                                            {!! $generator->getBarcode($producto->codigo, $generator::TYPE_CODE_128) !!}
                                        </p>
                                        <p class="text-muted">
                                            {{$producto->codigo}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('productos.index')}}" class="btn btn-primary float-right">Regresar</a>
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