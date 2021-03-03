@extends('layouts.admin')
@section('title','Registro de venta')
@section('styles')
{!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
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
    <a class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal-2">
      <span class="btn btn-warning">+ Registrar cliente</span>
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
            Registro de venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('ventas.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de venta</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'ventas.store', 'method'=>'POST']) !!}
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de venta</h4>
                    </div>
                    
                    @include('admin.venta._form')
                     
                     
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                     <a href="{{route('ventas.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Registro rápido de cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::open(['route'=>'clientes.store', 'method'=>'POST','files' => true]) !!}


            <div class="modal-body">

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" name="dni" id="dni" aria-describedby="helpId" required>
                </div>

                <input type="hidden" name="venta" value="1">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>

        {!! Form::close() !!}

        </div>
    </div>
</div>


@endsection
@section('scripts')
{!! Html::script('melody/js/alerts.js') !!}
{!! Html::script('melody/js/avgrund.js') !!}

{!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
{!! Html::script('js/sweetalert2.all.min.js') !!}
<script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input.noSubmit').forEach( node => node.addEventListener('keypress', e => {
        if(e.key === "Enter") {
          e.preventDefault();
        }
      }))
    });
  </script>
<script>
    
$(document).ready(function () {
    $("#agregar").click(function () {
        agregar();
    });
});
var cont = 1;
total = 0;
subtotal = [];
$("#guardar").hide();
$("#producto_id").change(mostrarValores);
function mostrarValores() {
    datosProducto = document.getElementById('producto_id').value.split('_');
    $("#precio").val(datosProducto[2]);
    $("#stock").val(datosProducto[1]);
}
var producto_id = $('#producto_id');
	
    producto_id.change(function(){
        $.ajax({
            url: "{{route('get_products_by_id')}}",
            method: 'GET',
            data:{
                producto_id: producto_id.val(),
            },
            success: function(data){
                $("#precio").val(data.precioVenta);
                $("#stock").val(data.stock);
                $("#codigo").val(data.codigo);
        }
    });
});
$(obtener_registro());
function obtener_registro(codigo){
    $.ajax({
        url: "{{route('get_products_by_barcode')}}",
        type: 'GET',
        data:{
            codigo: codigo
        },
        dataType: 'json',
        success:function(data){
            console.log(data);
            $("#precio").val(data.precioVenta);
            $("#stock").val(data.stock);
            $("#producto_id").val(data.id);
        }
    });
}
$(document).on('keyup', '#codigo', function(){
    var valorResultado = $(this).val();
    if(valorResultado!=""){
        obtener_registro(valorResultado);
    }else{
        obtener_registro();
    }
})
function agregar() {
    datosProducto = document.getElementById('producto_id').value.split('_');
    producto_id = datosProducto[0];
    producto = $("#producto_id option:selected").text();
    cantidad = $("#cantidad").val();
    descuento = $("#descuento").val();
    precio = $("#precio").val();
    stock = $("#stock").val();
    impuesto = $("#impuesto").val();
    if (producto_id != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio != "") {
        if (parseInt(stock) >= parseInt(cantidad)) {
            subtotal[cont] = (cantidad * precio) - (cantidad * precio * descuento / 100);
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="producto_id[]" value="' + producto_id + '">' + producto + '</td> <td> <input type="hidden" name="precio[]" value="' + parseFloat(precio).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(precio).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="descuento[]" value="' + parseFloat(descuento) + '"> <input class="form-control" type="number" value="' + parseFloat(descuento) + '" disabled> </td> <td> <input type="hidden" name="cantidad[]" value="' + cantidad + '"> <input type="number" value="' + cantidad + '" class="form-control" disabled> </td> <td align="right">' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                type: 'error',
                text: 'La cantidad a vender supera el stock.',
            })
        }
    } else {
        Swal.fire({
            type: 'error',
            text: 'Rellene todos los campos del detalle de la venta.',
        })
    }
}
function limpiar() {
    $("#cantidad").val("");
    $("#descuento").val("0");
}
function totales() {
    $("#total").html(total.toFixed(2));
    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html(total_impuesto.toFixed(2));
    $("#total_pagar_html").html( total_pagar.toFixed(2));
    $("#total_pagar").val(total_pagar.toFixed(2));
}
function evaluar() {
    if (total > 0) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}
function eliminar(index) {
    total = total - subtotal[index];
    total_impuesto = total * impuesto / 100;
    total_pagar_html = total + total_impuesto;
    $("#total").html( total);
    $("#total_impuesto").html(total_impuesto);
    $("#total_pagar_html").html( total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}
</script>

@endsection