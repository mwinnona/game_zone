<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>GAMEZONE</title>

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap.min.css")}}>

		<!--
		<link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap4.css")}}>
		<link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap4.min.css")}}>
		<link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap-grid4.css")}}>
		<link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap-grid4.min.css")}}>
		<link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap-reboot4.css")}}>
		<link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap.min.css")}}>-->
		
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href={{ asset("css/slick.css")}}>
		<link type="text/css" rel="stylesheet" href={{ asset("css/slick-theme.css")}}>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href={{ asset("css/nouislider.min.css")}}>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href={{ asset("css/font-awesome.min.css")}}>

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href={{ asset("css/style.css")}}>
		<link type="text/css" rel="stylesheet" href={{ asset("css/product.css")}}>
		
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> gamezone@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						@if (isset(Auth::user()->id))
						@if (Auth::user()->type_user==0)
							<li><a href="{{url('/reporte-pedidos')}}"><i class="fa fa-file-word-o"></i> Reportes</a></li>
						@else
						    <li><a href="{{url('/pedidos')}}"><i class="fa fa-opencart"></i> Pedidos</a></li>
						@endif
							<li><a href="{{url('/profile')}}"><i class="fa fa-user-o"></i> Mi cuenta</a></li>
							<li><a href="{{url('logout')}}"><i class="fa fa-user-o"></i> Logout</a></li>
						@else
						<li><a href="#"><i class="fa fa-opencart"></i> Pedidos</a></li>
						<li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Login</a></li>
						<li><a href="{{ route('register') }}"><i class="fa fa-user-o"></i> Registrar</a></li>
						@endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src={{URL::asset('./img/logo_gz.png')}} alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method ="POST" action ="{{url('/buscar_juego')}}" enctype="multipart/form-data">
									@csrf
									<select class="input-select">
										<option value="0">Nombre</option>
									</select>
									<input class="input" name="gameName" placeholder="Escriba el juego">
									<button type="submit" class="search-btn">Buscar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								
								<div>
									@if(isset(Auth::user()->id))
									<a href="{{URL('/carrito')}}">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrito</span>
									<div class="qty">+</div>
									</a>
									@else
									<a onclick="log()" href="#">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrito</span>
										<div class="qty">0</div>
									</a>
									@endif
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<!--<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Mi carrito</span>
										<div class="qty">3</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="products/naruto_to_boruto_shinobi_strikers_xbox_one.jpg" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">Shinobi Striker</a></h3>
													<h4 class="product-price"><span class="qty">0x</span>S/19.90</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
											

											
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">Ver carrito</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>-->
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menú</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="{{url('/producto')}}">Todos los Juegos</a></li>
						<li><a href="{{URL('/buscar/'.'1')}}">PS4</a></li>
						<li><a href="{{URL('/buscar/'.'2')}}">Xbox</a></li>
						<li><a href="{{URL('/buscar/'.'3')}}">Nintento Switch</a></li>
						@if (isset(Auth::user()->id))
                        @if (Auth::user()->type_user==0)
						<li><a href="{{URL('/profiles')}}">Usuarios</a></li>
						<li><a href="{{URL('/reporte-pedidos')}}">Reportes</a></li>
						@endif
						@endif
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
        <!-- /NAVIGATION -->
        
        <!-- CONTAINER -->
        <div class="container">
            <br>
            <h1><span class="text-danger">NUEVO</span> VENDEDOR</h1>
            <form method ="POST" action ="{{url('/crear_usuario')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="product-details">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="name">Nombres:</label>
                                        <input class="form-control" type="hidden" id="type" name="type" placeholder="0" value="0">
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Nombres" value="{{ old('name') }}">
                                        @if($errors->first('e_name'))
                                            <span class="text-danger"  >
                                                {{ $errors->first('e_name')}}
                                            </span>                                           
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastname">Apellidos:</label>
                                        <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Apellidos" value="{{ old('lastname') }}">
                                        @if($errors->first('e_lastname'))
                                            <span class="text-danger"  >
                                                {{ $errors->first('e_lastname')}}
                                            </span>                                           
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input class="form-control" type="text" id="email" name="email" placeholder="Ingrese su E-mail" value="{{ old('email') }}">
                                    <small id="emailHelp" class="form-text text-muted">No compartiremos su correo con nadie más.</small>
                                    @if($errors->first('e_name'))
                                        <span class="text-danger"  >
                                            {{ $errors->first('e_email')}}
                                        </span>                                           
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Digíte su contraseña">
                                    <small id="emailHelp" class="form-text text-muted">Use una combinación alfanumérica para que tu clave sea más segura.</small>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="repeat_password">Repetir Contraseña:</label>
                                    <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Repita la contraseña">
                                    @if($errors->first('e_password'))
                                        <span class="text-danger"  >
                                            {{ $errors->first('e_password')}}
                                        </span>                                           
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class="product-details centrar-interno">
                        <div class="add-to-cart col-md-6">
                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-user" ></i>Guardar Cambios</button>
                        </div>
                    </div>
                </div>
               </form>
        </div>
        <!-- /CONTAINER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Sobre nosotros</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>gamezone@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categorias</h3>
								<ul class="footer-links">
									<li><a href="#">Hot Sale</a></li>
									<li><a href="#">Play Station 4</a></li>
									<li><a href="#">Xbox</a></li>
									<li><a href="#">Nintento Switch</a></li>
									<li><a href="#">Accesorios</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Información</h3>
								<ul class="footer-links">
									<li><a href="#">Sobre nosotros</a></li>
									<li><a href="#">Contáctanos</a></li>
									<li><a href="#">Politicas privadas</a></li>
									<li><a href="#">Ordenes y devoluciones</a></li>
									<li><a href="#">Términos y condiciones</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Servicios</h3>
								<ul class="footer-links">
									<li><a href="{{url('/profile')}}">Mi cuenta</a></li>
									<li><a href="#">Ver carrito</a></li>
									<li><a href="#">Lista de deseos</a></li>
									<li><a href="#">Seguir mi orden</a></li>
									<li><a href="#">Ayuda</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

	</body>
</html>
<!-- jQuery Plugins -->
<script src={{ asset("js/jquery-3.4.1.min.js")}}></script>
<script src={{ asset("js/jquery.min.js")}}></script>
<script src={{ asset("js/main.js")}}></script>
<script src={{ asset("js/bootstrap.min.js")}}></script>
<script src={{ asset("js/slick.min.js")}}></script>
<script src={{ asset("js/nouislider.min.js")}}></script>
<script src={{ asset("js/jquery.zoom.min.js")}}></script>
<script src={{ asset("js/popper.min.js")}}></script>
<script>
    function log(){
        var a = confirm('Necesitas iniciar sesión para acceder al carrito, ¿Te redirijimos al login?');
        if(a==true){
            window.location="{{URL::to('login')}}"
        }
    }
</script>
<script>
    
    @if($errors->first('status'))
    $("#exampleModal").modal("show");
    @endif

</script>
