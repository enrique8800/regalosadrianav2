<div class="form-group">
    <label for="cliente_id">Cliente</label>
    <select class="form-control" name="cliente_id" id="cliente_id">
        @foreach ($clientes as $cliente)
        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
  <label for="codigo">Código de barras</label>
  <input type="text" name="codigo" id="codigo" class="form-control noSubmit" autofocus aria-describedby="helpId">
</div>

  <div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select class="form-control" name="producto_id" id="producto_id">
                <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($productos as $producto)
                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="">Stock actual</label>
            <input type="text" name="" id="stock" value="" class="form-control" disabled>
          </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="precio">Precio de venta</label>
            <input type="number" class="form-control noSubmit" step="0.01" name="precio" id="precio" aria-describedby="helpId" disabled>
        </div>
    </div>
  </div>




  <div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control noSubmit" name="cantidad" id="cantidad" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="impuesto">Impuesto</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control noSubmit" name="impuesto" id="impuesto" aria-describedby="basic-addon3" value="18">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="descuento">Porcentaje de descuento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">%</span>
            </div>
            <input type="number" class="form-control noSubmit" name="descuento" id="descuento" aria-describedby="basic-addon2" value="0">
        </div>
    </div>
  </div>







<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>
<div class="form-group">
    <h4 class="card-title">Detalles de venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio Venta </th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL IMPUESTO:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">0.00</span> <input type="hidden"
                                name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
