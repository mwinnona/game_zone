@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Carrito') </title>

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
                    <li><a href="#">INICIO</a></li>
                    <li class="active">CARRITO DE COMPRAS</li>
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
            <form method="POST" action="{{url('/realizar_pedido')}}" enctype="multipart/form-data">
                @csrf
            <div class="col-md-9" style="height:400px; overflow: scroll">
                <!-- Aqui van los productos del carrito-->
                <!--Aqui estaria el for para iterar todos los productos-->
                @for($i=0;$i<count($cart_products);$i++)
                @for($j=0;$j<count($products);$j++)
                @if($products[$j]->id==$cart_products[$i]->id_product)
                <br>
                <div class="col-md-12 order-details">
                    <br>
                    <div class="col-md-2">
                        <!--Aquí van las imagenes del Producto-->
                        <img src={{URL::asset($products[$j]->image)}} width="80" height="100">
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <!--Aquí va el nombre del producto-->
                                <h4 id="name" name="name">{{$products[$j]->name}}</h4>
                                <br>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Plataforma: </label>
                                        </div>
                                        <div class="col-md-7">
                                            <!--Aquí va la plataforma del Producto-->
                                            @if($products[$j]->plataform=='0')
                                            <h4 class="texto-playStation" id="platform" name="platform">PS4</h4>
                                            @elseif($products[$j]->plataform=='1')
                                            <h4 class="texto-xbox" id="platform" name="platform">XBOX</h4>
                                            @elseif($products[$j]->plataform=='2')
                                            <h4 class="texto-nintendo" id="platform" name="platform">NINTENDO SWITCH</h4>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-push-2 product-details">
                                                <!--Aquí va el precio unitario del producto-->
                                                <h3 class="product-price" id="price" name="price">S/. {{$products[$j]->price}}<del class="product-old-price">S/. 60.00</del></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="add-to-cart">
                                            <!--Aquí va la cantidad del producto-->
                                            <div class="qty-label">
                                                <div class="input-number">
                                                    <input id="quantity[]" name="quantity[]" type="number" value="{{$cart_products[$i]->quantity}}"/><span class="qty-up">+</span>
                                                    <span class="qty-down">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="row">
                                    <br>
                                    <!--Este checkbox sirve para elegir el producto en el Pedido-->
                                    <!--<div class="input-checkbox">
                                        <input type="checkbox" id="category-" name="check-product">
                                        <label for="category-2"><span>
                                            </span><small></small>
                                        </label>
                                    </div>-->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$cart_products[$i]->id}}" id="escoger[]" name="escoger[]">
                                        <!--<label class="form-check-label" for="defaultCheck1"></label>-->
                                        <input type="hidden" id="id_product[]" name="id_product[]" value="{{$cart_products[$i]->id_product}}">
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endfor
                @endfor
                <!--Fin del for-->
            </div>
            <div class="col-md-3">
                <div class="product-details">
                    <div class="add-to-cart centrar-interno">
                        <button type="submit" class="add-to-cart-btn"><i class="fa fa-close"></i>Eliminar Seleccionados</button>
                    </div>
                </div>
                <div class="product-details">
                    <div class="add-to-cart centrar-interno">
                        <button type="submit" class="add-to-cart-btn"><i class="fa fa-close"></i>Eliminar Todos</button>
                    </div>
                </div>
                <div class="product-details centrar-interno">
                    <div class="add-to-cart">
                        <button type="submit" class="add-to-cart-btn"><i class="fa fa-cart-plus"></i>Realizar Pedido</button>
                    </div>
                </div>
            </div>
            </form>
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