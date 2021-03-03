<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Códigos de barras</title>
    <style>
        .row{
            margin: 0px;
        }
        h2{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    
    <div class="row">
        @foreach ($productos as $producto)
        @php
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        @endphp
        <div class="col-md-4">
            <div> {!! $generator->getBarcode($producto->codigo, $generator::TYPE_CODE_128) !!}</div>
            <h2>{{$producto->codigo}}</h2>
        </div>
        @endforeach
    </div>
</body>
</html>