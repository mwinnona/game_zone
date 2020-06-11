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