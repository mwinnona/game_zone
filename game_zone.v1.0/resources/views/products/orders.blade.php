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
                    <li class="active">PEDIDOS</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Cart-->
            <div class="col-md-12">
                <!-- Aqui van los productos del carrito-->
                <!--Aqui estaria el for para iterar todos los productos-->
                <br>
                @for($i=0;$i<count($orders);$i++)
                <div class="col-md-12 order-details">
                    <br>
                    <div class="col-md-2">
                        <h4 id="id" name="id">N°00000{{$orders[$i]->id}}</h4>
                        <!--Aquí van las imagenes del Producto-->
                        <div class="col-md-push-2 product-details">
                            <!--Aquí va el precio unitario del producto-->
                            <h3 class="product-price" id="price" name="price">S/. {{$orders[$i]->total_amount}}</h3>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            @for($j=0;$j<count($orderProducts);$j++)
                            @if($orderProducts[$j]->id_order==$orders[$i]->id)
                            @for($k=0;$k<count($products);$k++)
                            @if($products[$k]->token_product==$orderProducts[$j]->token_order_product)
                            <img src={{URL::asset($products[$k]->image)}} width="80" height="100">
                            @break
                            @endif
                            @endfor
                            @break
                            @endif
                            @endfor
                        </div>
                    </div>
                </div>
                @endfor
                <!--Fin del for-->
            </div>
            <!-- Cart-->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@endsection

@section('plugin')
<script src={{ asset("js/products.js")}}></script> 
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>
@endsection