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

    <title>Oferta</title>
</head>
<body>
    <p>Hola {{$user_name}}, tenemos una nueva oferta para ti:</p>
    <div class="container">
        <div class="col-md-4">
            <h2>Precios bajos!!!</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="product">
            <div class="product-img">
                <img src="{{$message->embed($product->image)}}" alt="" width="200" height="350">
            </div>
            <div class="product-body">
                <h3 class="product-name">{{$product->name}}</h3>
                <p class="product-category">Plataforma:</p>
                @if ($product->plataform=='1')
                    <h3 class="product-name"><a href="{{URL('/buscar/'.'1')}}">Play Station 4</a></h3>
                @elseif ($product->plataform=='2')
                    <h3 class="product-name"><a href="{{URL('/buscar/'.'2')}}">Xbox</a></h3>
                @else 
                    <h3 class="product-name"><a href="{{URL('/buscar/'.'3')}}">Nintento Switch</a></h3>
                @endif
                <h4 class="product-price">S/. {{$deal_price}} <del class="product-old-price">S/. {{$product->price}}</del></h4>
                <!-- -->
            </div>
            
        </div>
    </div>
</body>
</html>
