@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Pedido') </title>

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
                    <li><a href="#">CARRITO DE COMPRAS</a></li>
                    <li class="active">Pedido</li>
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
            <h1>Holi Boli</h1>
            @for($i=0;$i<count($cart_products);$i++)
            <br>
            <h4>ID: {{$cart_products[$i]->id}}</h4>
            <br>
            <h4>ID Product: {{$cart_products[$i]->id_product}}</h4>
            <br>
            <h4>ID User: {{$cart_products[$i]->id_user}}</h4>
            <br>
            <h4>Quantity: {{$cart_products[$i]->quantity}}</h4>
            @endfor
            <!-- Order Details -->
					<div class="col-md-6 order-details">
						<div class="section-title text-center">
							<h3 class="title">Tu Pedido</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCTOS</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<!--Productos del pedido-->
								<!--Aquí empieza el for para iterar los productos-->
								<div class="order-col">
									<!--Aquí va la cantidad elegida del producto-->
									<div id="quantityProductOrder" name="quantityProductOrder">2</div>
									<!--Aquí va el nombre del producto elegido-->
									<div id="nameProductOrder" name="nameProductOrder">God Of War</div>
									<!--Aquí va el precio total del producto(cantidad*precio)-->
									<div id="priceProductOrder" name="priceProductOrder">$980.00</div>
								</div>
								<!--Fin del for-->
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<!--Aquí va el precio total del pedido-->
								<div>
									<strong class="order-total" id="priceOrder" name="priceOrder">$2940.00</strong>
								</div>
							</div>
						</div>
						<div class="col-md-10 col-md-offset-1 product-details">
							<div class="add-to-cart">
								<button type="submit" class="add-to-cart-btn">
									<i class="fa fa-shopping-cart"></i>Realizar Pedido
								</button>
							</div>
						</div>
					</div>
					<!-- /Order Details -->
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
@endsection