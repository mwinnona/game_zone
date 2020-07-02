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
                <a href={{URL('/ver-pedido/'.$orders[$i]->token_order)}}><div class="col-md-12 order-details">
                    <br>
                    <div class="col-md-2">
                        <h4 id="id" name="id">N°000{{$orders[$i]->id}}</h4>
                        <!--Aquí van las imagenes del Producto-->
                        <div class="col-md-push-2 product-details">
                            <!--Aquí va el precio unitario del producto-->
                            <h3 class="product-price" id="price" name="price">S/. {{$orders[$i]->total_amount}}</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-calendar"></i><span class="tooltipp"> {{$orders[$i]->date_realization}}</span>
                        <br>
                        <br>
                        <div class="product-details">
                            <label style="font-size: 2em;">Estado:
                                @if($orders[$i]->status=='1' || $orders[$i]->status==1)
                                <h3 class="product-price">PAGADO</h3>
                                @elseif($orders[$i]->status=='2' || $orders[$i]->status==2)
                                <h3 class="product-price">ENVIADO</h3>
                                @elseif($orders[$i]->status=='3' || $orders[$i]->status==3)
                                <h3 class="product-price">FINALIZADO</h3>
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            @for($j=0;$j<count($orderProducts);$j++)
                                @if($orderProducts[$j]->id_order==$orders[$i]->id)
                                    @for($k=0;$k<count($products);$k++)
                                        @if($products[$k]->token_product==$orderProducts[$j]->token_order_product)
                                            <img src={{URL::asset($products[$k]->image)}} width="80" height="100">
                                            @break
                                        @endif
                                    @endfor
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="col-md-1">
                        <label>Factura:
                            <a href="{{URL('/factura/'.$orders[$i]->token_order)}}" target="_blank"><span><i class="fa fa-download" aria-hidden="true"></i></span></a>
                        </label>
                    </div>
                </div></a>
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