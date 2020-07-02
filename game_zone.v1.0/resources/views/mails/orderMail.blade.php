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
    <title>Pedido Realizado</title>
</head>
<body>
    <p>Hola {{$user_name}}, tu pedido ah sido realizado de manera exitosa:</p>
    <div class="container">
        <div class="col-md-4">
            <a href="{{URL('/producto')}}"><h2 class="text-white-50">Pedido: N°000{{$order->id}}</h2></a>
        </div>
        <div class="col-md-4">
            <h2 class="text-white-50">Fecha: {{$order->date_realization}}</h2>
        </div>
        <div class="col-md-4">
            <h2 class="text-danger">Monto Total: S/. {{$order->total_amount}}</h2>
        </div>
    </div>
    @for($i=0;$i<count($productsOrder);$i++)
    @for($j=0;$j<count($products);$j++)
    @if($products[$j]->token_product==$productsOrder[$i]->token_order_product)
    <div class="row">
    <div class="col-md-4">
        <div class="product">
            <div class="product-img">
                <img src="{{$message->embed($products[$j]->image)}}" alt="" width="200" height="350">
            </div>
            <div class="product-body">
                <h3 class="product-name">{{$products[$j]->name}}</h3>
                <p class="product-category">Plataforma:</p>
                @if ($products[$j]->plataform=='1')
                    <h3 class="product-name"><a href="{{URL('/buscar/'.'1')}}">Play Station 4</a></h3>
                @elseif ($products[$j]->plataform=='2')
                    <h3 class="product-name"><a href="{{URL('/buscar/'.'2')}}">Xbox</a></h3>
                @else 
                    <h3 class="product-name"><a href="{{URL('/buscar/'.'3')}}">Nintento Switch</a></h3>
                @endif
                <h4 class="product-price">S/. {{$products[$j]->price}} <del class="product-old-price"></del></h4>
                <!-- -->
            </div>
            
        </div>
    </div>
    </div>
    @break
    @endif
    @endfor
    @endfor
</body>
</html>
