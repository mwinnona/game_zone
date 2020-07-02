<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Factura Electrónica</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">FACTURA ELECTRÓNICA</h1>
        <div class="col-md-12">
            <table class="table table-bordered table-hover bg-danger">
                <thead>
                    <tr>
                        <th class="text-center" colspan="3">GAME-ZONE</th>
                        <th class="text-center" scope="col">Pedido: N°000{{$order->id}}</th>
                        <th class="text-center" scope="col">Ruc: N°20602250602</th>
                    </tr>
                    <tr>
                        <th class="text-right" scope="col">Nombre:</th>
                        <th class="text-center" colspan="2">{{$user->name}} {{$user->lastname}}</th>
                        <th class="text-right" scope="col">Fecha:</th>
                        <th class="text-center" scope="col">{{$order->date_realization}}</th>
                    </tr>
                </thead>
            </table>
            <br>
            <table class="table table-bordered table-hover bg-danger">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Nombre del Juego</th>
                    <th class="text-center" scope="col">Cantidad</th>
                    <th class="text-center" scope="col">Precio Unitario</th>
                    <th class="text-center" scope="col">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<count($order_Products);$i++)
                    @for($j=0;$j<count($products);$j++)
                    @if($products[$j]->token_product == $order_Products[$i]->token_order_product)
                    <tr class="hover">
                        <th class="text-center" scope="row">{{$i}}</th>
                        <td class="text-center">{{$products[$j]->name}}</td>
                        <td class="text-center">{{$order_Products[$i]->quantity}}</td>
                        <td class="text-center">{{$products[$j]->price}}</td>
                        <td class="text-center">{{$order_Products[$i]->subtotal}}</td>
                    </tr>
                    @endif
                    @endfor
                    @endfor
                    <th class="text-right" colspan="4">TOTAL: </th>
                    <th class="text-center">{{$order->total_amount}}</th>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>