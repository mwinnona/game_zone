
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar</title>
    <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap2.min.css")}}>
        <link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap.min.css")}}>
        <link type="text/css" rel="stylesheet" href={{ asset("css/myC.css")}}>
        
        <!-- Plus Style -->
        <link type="text/css" rel="stylesheet" href={{ asset("css/plus-style.css")}}>
        
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href={{ asset("css/slick.css")}}>
		<link type="text/css" rel="stylesheet" href={{ asset("css/slick-theme.css")}}>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href={{ asset("css/nouislider.min.css")}}>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href={{ asset("css/font-awesome.min.css")}}>

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href={{ asset("css/style.css")}}>

</head>
<body style="background-color: black" class="align-content-center">
	<div class="container-fluid m-5 p-5">
        <div class="row">
            <div class="container-fluid  col-lg-4 rounded " style="background-color: white">
                <div class="row">
                    <div class="col-lg-6 center-block">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="{{ asset("img/logo_gz.png")}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <br>       
                <form method ="POST" action ="{{url('/crear_usuario')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <input class="form-control" type="hidden" id="type" name="type" placeholder="1" value="1">
                                <label for="name" >{{ __('Name') }}</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Nombres">
                                    @if($errors->first('e_name'))
                                        <span class="text-danger"  >
                                            {{ $errors->first('e_name')}}
                                        </span>                                           
                                    @endif
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">Apellidos:</label>
                                <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Apellidos">
                                @if($errors->first('e_lastname'))
                                    <span class="text-danger"  >
                                        {{ $errors->first('e_lastname')}}
                                    </span>                                           
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="email" >{{ __('E-Mail Address') }}</label>

                            <input class="form-control" type="text" id="email" name="email" placeholder="Ingrese su E-mail">
                            <small id="emailHelp" class="form-text text-muted">No compartiremos su correo con nadie más.</small>
                            @if($errors->first('e_name'))
                                <span class="text-danger"  >
                                    {{ $errors->first('e_email')}}
                                </span>                                           
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Digíte su contraseña">
                            <small id="emailHelp" class="form-text text-muted">Use una combinación alfanumérica para que tu clave sea más segura.</small>
                            
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Repita la contraseña">
                            @if($errors->first('e_password'))
                                <span class="text-danger"  >
                                    {{ $errors->first('e_password')}}
                                </span>                                           
                            @endif
                        </div>
        
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn-rounded btn primary-btn btn-block mt-2">
                                {{ __('Register') }}
                            </button>
                            
                        </div>
                        <div class="form-group text-center">
                            <a href="{{ route('login') }}">¿Ya tienes una cuenta?</a>
                        </div>
                            
                            <br>
                    </form>                    
                </div>
        </div>
    </div>                   
                       
</body>
</html>
<script src={{ asset("js/jquery.min.js")}}></script>
<script src={{ asset("js/bootstrap.min.js")}}></script>
<script src={{ asset("js/slick.min.js")}}></script>
<script src={{ asset("js/nouislider.min.js")}}></script>
<script src={{ asset("js/jquery.zoom.min.js")}}></script>
<script src={{ asset("js/main.js")}}></script>
