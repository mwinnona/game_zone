
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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" >{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" >{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
