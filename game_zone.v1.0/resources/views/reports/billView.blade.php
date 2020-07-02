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
                    <li><a href="{{url('/producto')}}">INICIO</a></li>
                    <li><a href="{{url('/reporte-pedidos')}}">REPORTES</a></li>
                    <li><a href="{{url('/ranking')}}">RANKING</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<div class="container">
    <div class="col-md-10">
        <h1 >Pedido N°000{{$order->id}}</h1>
    </div>
    <div class="col-md-2">
        <label>Factura:
            <a href="{{URL('/factura/'.$order->token_order)}}"><span><i class="fa fa-download" aria-hidden="true"></i></span></a>
        </label>
    </div>
    <br>
    <div class="col-md-12">
        <table class="table table-bordered table-hover">
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
        <table class="table table-bordered table-hover">
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

@endsection

@section('plugin')
@endsection