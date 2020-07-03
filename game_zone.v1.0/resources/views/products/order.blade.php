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
                    <li><a href="{{url('/carrito')}}">CARRITO DE COMPRAS</a></li>
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
			<!-- Order Details -->
			    <form method="POST" action="{{url('/confirmar_pedido')}}" enctype="multipart/form-data">
			    @csrf
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
								@for($i=0;$i<count($products);$i++)
								<div class="order-col">
									<!--Aquí va la cantidad elegida del producto-->
									<input class="form-control" type="hidden" id="token[]" name="token[]" value="{{$products[$i]->token_product}}">
									<div><h4 class="text-warning">{{$products[$i]->stock}}</h4></div>
									<input class="form-control" type="hidden" id="quantity[]" name="quantity[]" value="{{$products[$i]->stock}}">
									<!--Aquí va el nombre del producto elegido-->
									<div>
										<img src={{URL::asset($products[$i]->image)}} width="40" height="50">
									</div>
									<div><h4>{{$products[$i]->name}}</h4></div>
									<!--Aquí va el precio total del producto(cantidad*precio)-->
									<div><h4>S/. {{$products[$i]->price}}</h4></div>
									<input class="form-control" type="hidden" id="subTotal[]" name="subTotal[]" value="{{$products[$i]->price}}">
								</div>
								@endfor
								<!--Fin del for-->
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<!--Aquí va el precio total del pedido-->
								<div>
									<strong class="order-total">S/.{{$total_amount}}</strong>
									<input class="form-control" type="hidden" id="priceOrder" name="priceOrder" value="{{$total_amount}}">
								</div>
							</div>
						</div>
					</div>
					<!-- /Order Details -->
					<div class="col-md-6 order-details">
						<div clas="col-md-6">
							<div class="row">
								<div class="col"><h5>Tarjeta/Paypal</h5></div>
								<div class="col-4">
									<label class="switch" >
										<input type="checkbox" id="slideTarjeta">
										<span class="slider round" ></span>
									</label>
								</div>
							</div>
						</div>
						<div id="tarjeta" style="display:inline">
						<h3 class="text-center">Pago por Tarjeta de Crédito</h3>
						<br>
						<div class="col-md-12">
							<div clas="form-group">
								<label for="nameHolder">Nombre del Titular:</label>
								<input class="form-control" type="text" id="nameHolder" name="nameHolder">
								<br>
							</div>
						</div>
						<div class="col-md-12">
							<div class="row form-group">
								<div class="col-md-6">
									<i class="fa fa-credit-card-alt"></i>
									<label for="cardNumber">Número de Tarjeta:</label>
									<input class="form-control" type="text" id="cardNumber" name="cardNumber">
								</div>
								<div class="col-md-6">
									<label for="fecha">Fecha de Vencimiento:</label>
									<input type="month" name="fecha" id="fecha" class="form-control" value="2020-08">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="row form-group">
								<div class="col-md-3">
									<i class="fa fa-credit-card-alt"></i>
									<label for="cardNumber">CVC:</label>
									<input class="form-control" type="text" id="cardNumber" name="cardNumber">
								</div>
							</div>
						</div>
						<div class="col-md-8 col-md-offset-2 product-details">
							<div class="add-to-cart">
								<button  type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Finalizar Pedido</button>
							</div>
						</div>
					</div>
					<div id="paypal" style="display:none">
						<h3 class="text-center">Pago por Paypal</h3>
						<br>
						<div class="col-md-12">
							<div class="row form-group">
								<div class="col-md-6">
									<i class="fa fa-credit-card-alt"></i>
									<label for="cardNumber">Usuario:</label>
									<input class="form-control" type="text" id="paypalUser" name="paypalUser">
								</div>
								<div class="col-md-6">
									<label for="fecha">Contraseña:</label>
									<input class="form-control" type="text" id="paypalPassword" name="paypalPassword">
								</div>
							</div>
						</div>
						<div class="col-md-8 col-md-offset-2 product-details">
							<div class="add-to-cart">
								<button  type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Finalizar Pedido</button>
							</div>
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
<script src={{ asset("js/metodo.js")}}></script>  
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
		alert(msg);
	}
</script>

@endsection