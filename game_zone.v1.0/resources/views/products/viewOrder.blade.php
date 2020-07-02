@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Pedidos') </title>

@section('css')
@endsection

@section('plugincss')
@section('style')
   
@endsection


@section('content')

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{url('/producto')}}">INICIO</a></li>
                    <li><a href="{{url('/pedidos')}}">PEDIDOS</a></li>
                    <li class="active">N°000{{$order->id}}</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- View products -->
<div id="store" class="col-md-9">
<div class="row">
    <!-- product -->
    @for($i=0;$i<count($order_Products);$i++)
    @for($j=0;$j<count($products);$j++)
    @if($products[$j]->token_product == $order_Products[$i]->token_order_product)
    <div class="col-md-4 col-xs-6">
        <div class="product">
            <div class="product-img">
                <img src={{URL::asset($products[$j]->image)}} alt="" width="100" height="350">
            </div>
            <div class="product-body">
                @if($products[$j]->plataform == 1 || $products[$j]->plataform == '1')
                <p class="product-category">PS4</p>
                @elseif($products[$j]->plataform == 2 || $products[$j]->plataform == '2')
                <p class="product-category">XBOX</p>
                @else
                <p class="product-category">NINTENDO</p>
                @endif
                <h3 class="product-name"><a href="#">{{$products[$j]->name}}</a></h3>
                <h4 class="product-price">S/. {{$products[$j]->price}}</h4>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="product-btns">
                    <h3 class="product-name">Cantidad: {{$order_Products[$i]->quantity}}</h3>
                    <h4 class="product-price">Sub Total: S/. {{$order_Products[$i]->subtotal}}</h4>
                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                    <a class="quick-view" href="{{URL('/ver_producto/'.$products[$i]->token_product)}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endfor
    @endfor
    <!-- /product -->
</div>
</div>
<div class="col-md-3">
    <h1>N°000{{$order->id}}</h1>
    <br>
    <div class="product-details">
        <label style="font-size: 2em;">Monto: <h3 class="product-price">S/. {{$order->total_amount}}</h3></label>
    </div>
    <br>
    <i class="fa fa-calendar"></i><span class="tooltipp">  {{$fecha}}</span>---- <i class="fa fa-clock-o"></i><span class="tooltipp">  {{$hora}}</span>
    <br>
    <br>
    <div class="product-details">
        <label>Factura:
            <a href="{{URL('/factura/'.$order->token_order)}}" target="_blank"><span><i class="fa fa-download" aria-hidden="true"></i></span></a>
        </label>
    </div>
    <br>
    <div class="product-details">
    <label style="font-size: 2em;">Estado:
        @if($order->status=='1' || $order->status==1)
        <h3 class="product-price">PAGADO</h3>
        @elseif($order->status=='2' || $order->status==2)
        <h3 class="product-price">ENVIADO</h3>
        @elseif($order->status=='3' || $order->status==3)
        <h3 class="product-price">FINALIZADO</h3>
        @endif
    </label>
    </div>
    <br>
    @if($order->status=='2' || $order->status==2)
    <div class="product-details">
        <div class="add-to-cart centrar-interno">
            <a href="{{URL('/updateStatus/'.$order->token_order)}}" onclick="confirm('Esta seguro ?, despues de aceptar al recepción del pedido no podra obtener un reembolso.')"><button class="add-to-cart-btn"><i class="fa fa-close"></i>Pedido Recibido</button></a>
        </div>
    </div>
    <br>
    @endif
    <div class="product-details">
        <div class="add-to-cart centrar-interno">
            <a href="{{URL('/reclamo/'.$order->token_order)}}"><button class="add-to-cart-btn"><i class="fa fa-close"></i>Atención al Cliente</button></a>
        </div>
    </div>
</div>
@endsection

@section('plugin')
<script src={{ asset("js/products.js")}}></script> 
@endsection