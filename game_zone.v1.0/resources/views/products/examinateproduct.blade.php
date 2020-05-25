

@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Mi cuenta') </title>

@section('css')
@endsection

@section('plugincss')
@section('style')
   
@endsection

@section('content')
    
     <!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Inicio</a></li>
                            <li><a href="#">Productos</a></li>
                            <!--Aca va el nombre del Producto-->
							<li class="active">Nombre del Producto</li>
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
					<!-- Product main img (Imagenes y videos de ejemplo)-->
					<div class="col-md-5 text-center">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="https://vignette.wikia.nocookie.net/godofwar/images/1/1b/Portada_God_of_War_%282018%29.jpg/revision/latest?cb=20170614100641&path-prefix=es" alt="">
                            </div>
						</div>
					</div>

					<!-- Product details -->
					<div class="col-md-6 col-md-push-1">
						<div class="product-details">
                            <!--Nombre del Producto-->
                        <h2 class="product-name" id="name" name="name">{{$products['name']}}</h2>
							<div>
                                <!--Precio del Producto-->
                                <h3 class="product-price" id="price" name="price">S/. {{$products['price']}} <del class="product-old-price">{{$products['price']}}</del></h3>
                                <!--Producto en stock solo si tiene unidades >=1-->
								<span class="product-available">In Stock</span>
                            </div>
                            <!--Descripción del Producto-->
                            <p>{{$products['description']}}</p>
                            
                            <div class="product-options">
                                <!--Aqui va la plataforma del producto-->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Plataforma: </label>
                                        </div>
                                        <!--cambiar el class="" a (texto-playStation, texto-xbox, texto-nintendo) segun la plataforma-->
                                        <div class="col-md-7">
                                            @if($products['plataform']==0)
                                                <h4 class="texto-playStation" id="platform" name="platform">PS4</h4>
                                            @elseif($products['plataform']==1)
                                                <h4 class="texto-xbox" id="platform" name="platform">Xbox</h4>
                                            @else
                                                <h4 class="texto-nintendo" id="platform" name="platform">Nintento</h4>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <!--Aqui va el Género del producto-->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Género: </label>
                                        </div>
                                        <div class="col-md-7">
                                            @if($products['gender']==0)
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">Aventura</h4>
                                            @elseif($products['gender']==1)
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">Estrategia</h4>
                                            @elseif($products['gender']==2)
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">Shooters</h4>
                                            @elseif($products['gender']==3)
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">Lucha</h4>
                                            @elseif($products['gender']==4)
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">RPG</h4>
                                            @elseif($products['gender']==5)
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">ARPG</h4>
                                            @elseif($products['gender']==6)
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">Plataformas</h4>
                                            @elseif($products['gender']==7)
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">Simulación</h4>
                                            @else
                                                <h4 class="texto-normal-gray" id="gender" namae="gender">Survival Horror</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!--Aquí va la fecha de lanzamiento del producto-->
							<div class="product-options text-center">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Fecha de Lanzamiento: </label>
                                    </div>
                                    <div class="col-md-7">
                                        <h4 class="texto-normal-gray" id="release_date" name="release_date">{{$products['release_date']}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="product-options">
                                <!--Aqui va la cantidad de unidades del producto-->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Stock: </label>
                                        </div>
                                        <div class="col-md-7">
                                            <h4 class="texto-normal-red">{{$products['stock']}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <!--Aqui va el tipo de producto (Físico, Digital)-->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Tipo: </label>
                                        </div>
                                        <div class="col-md-7">
                                            @if($products['type_product']==0)
                                            <h4 class="texto-normal-red" id="type_product" name="type_product">Físico</h4>
                                            @else
                                            <h4 class="texto-normal-red" id="type_product" name="type_product">Virtual</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <br>
                                <div class="add-to-cart text-center">
                                    <button type="button" class="add-to-cart-btn" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-arrow-circle-o-right">
                                        </i>Editar Producto
                                    </button>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<!-- /container -->
		</div>
        <!-- /SECTION -->

        <!--Este es el modal para editar el producto, aqui tienen que ir los datos del producto-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h2 class="modal-title" id="exampleModalLabel">Modificar Producto</h2>
                </div>
                <form method ="POST" action ="{{url('/modificar_producto/'.$products['token_product'])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!--Nuevo Producto-->
                    
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="product-details">
                                    
                                    <div class="form-group ">
                                        <label for="name">Nombre Completo del Producto:</label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{$products['name']}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea class="form-control" type="text" id="description" name="description" value="{{$products['description']}}"></textarea>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="price">Precio:</label>
                                            <input class="form-control" type="number" id="price" name="price" value="{{$products['price']}}">
                                        </div>
                                        <div class="col-md-6"><label for="release_Date">Lanzamiento:</label>
                                            <input class="form-control" type="date" id="release_date" name="release_date" value="{{$products['release_date']}}">
                                        </div>
                                    </div>
    
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="platform">Plataforma:</label>
                                            <select class="form-control" name="plataform" id="platform">
                                                <option value="0">Ps4</option>
                                                <option value="1">Xbox</option>
                                                <option value="2">Nint. Switch</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6"><label for="gender">Género:</label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="0">Aventura</option>
                                                <option value="1">Shooters</option>
                                                <option value="2">Estrategia</option>
                                                <option value="3">Lucha</option>
                                                <option value="4">RPG</option>
                                                <option value="5">ARPG</option>
                                                <option value="6">Plataformas</option>
                                                <option value="7">Survival Horror</option>
                                                <option value="8">Simulación</option>
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="stock">Stock:</label>
                                            <input class="form-control" type="number" id="stock" name="price" value="10">
                                        </div>
                                        <div class="col-md-6"><label for="type_product">Tipo:</label>
                                            <select class="form-control" name="type_product" id="type_product">
                                                <option value="0">Físico</option>
                                                <option value="1">Digital</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                  
                                    <div class="form-group">
                                        <label for="image">Imagen:</label>
                                        <input type="file" id="image" name="image" maxlength="1000000" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <div class="product-details centrar-interno">
                            <div class="add-to-cart col-md-6">
                                <button type="button" class="add-to-cart-btn" data-dismiss="modal"><i class="fa fa-close"></i>Cerrar</button>
                            </div>
                            <div class="add-to-cart col-md-6">
                                <button type="submit" class="add-to-cart-btn"><i class="fa fa-cloud-upload"></i>Guardar Cambios</button>
                            </div>
                        </div>
                    </div>
                </form>
    
    
    
              </div>
            </div>
        </div>
    
    {{$products}}
    {{$products['name']}}
@endsection
@section('plugin')
   
@endsection