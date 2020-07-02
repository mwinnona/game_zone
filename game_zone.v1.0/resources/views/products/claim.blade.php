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
                    <li><a href="{{url('/ver-pedido/'.$order->token_order)}}">N°000{{$order->id}}</a></li>
                    <li class="active">Atención al Cliente</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- Claim-->
<div class="container">
    <form method="POST" action="{{url('/reclamo-mail')}}" enctype="multipart/form-data">
    @csrf
    <div class="col-md-8">
        <div class="product-details">
            <div class="form-group ">
                <label for="name">Pedido: </label>
                <input class="form-control" type="text" id="order_id" name="order_id" value="N°000{{$order->id}}" readonly>
                <input class="form-control" type="hidden" id="token_order" name="token_order" value="{{$order->token_order}}">
            </div>
            <div class="form-group ">
                <label for="name">Asunto: </label>
                <input class="form-control" type="text" id="affair" name="affair" placeholder="Ingresa el asunto del reclamo" value="{{old('affair')}}">
                @if($errors->first('e_affair'))
                    <span class="text-danger">{{$errors->first('e_affair')}}</span>                                           
                @endif
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" type="text" id="description" name="description" rows="8" placeholder="Describe el problema que se te a presentado" value="{{old('description')}}"></textarea>
                @if($errors->first('e_decription'))
                    <span class="text-danger">{{ $errors->first('e_decription')}}</span>                                           
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="product-details">
            <div class="add-to-cart centrar-interno">
                <a href="{{URL('/reclamo/'.$order->token_order)}}"><button class="add-to-cart-btn"><i class="fa fa-mail-forward"></i>Enviar</button></a>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@section('plugin')
<script src={{ asset("js/products.js")}}></script> 
@endsection