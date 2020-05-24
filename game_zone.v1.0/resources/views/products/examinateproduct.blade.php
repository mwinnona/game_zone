

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
							<h2 class="product-name" id="name" name="name">Aqui va el nombre del Prodcuto</h2>
							<div>
                                <!--Precio del Producto-->
                                <h3 class="product-price" id="price" name="price">$45.00 <del class="product-old-price">$60.00</del></h3>
                                <!--Producto en stock solo si tiene unidades >=1-->
								<span class="product-available">In Stock</span>
                            </div>
                            <!--Descripción del Producto-->
                            <p>Aqui va la descripcion del producto. Aqui va la descripcion del producto.Aqui va la descripcion del producto.Aqui va la descripcion del producto.</p>
                            
                            <div class="product-options">
                                <!--Aqui va la plataforma del producto-->
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Plataforma: </label>
                                        </div>
                                        <!--cambiar el class="" a (texto-playStation, texto-xbox, texto-nintendo) segun la plataforma-->
                                        <div class="col-md-7">
                                            <h4 class="texto-playStation" id="platform" name="platform">PS4</h4>
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
                                            <h4 class="texto-normal-gray" id="gender" namae="gender">RPG</h4>
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
                                        <h4 class="texto-normal-gray" id="release_date" name="release_date">27/04/2018</h4>
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
                                            <h4 class="texto-normal-red">99</h4>
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
                                            <h4 class="texto-normal-red" id="type_product" name="type_product">Físico</h4>
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
                  <h2 class="modal-title" id="exampleModalLabel">Detalles del Producto</h2>
                </div>
                <form method ="POST" action ="{{url('/crear_producto')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!--Nuevo Producto-->
                    
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="product-details">
                                    
                                    <div class="form-group ">
                                        <label for="name">Nombre Completo del Producto:</label>
                                        <input class="input" type="text" id="name" name="name" placeholder="Ejemplo: Final Fantasy XV Royal Edition 2018">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea class="form-control" type="text" id="description" name="description" placeholder="Describe el producto"></textarea>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="price">Precio:</label>
                                            <input class="input" type="number" id="price" name="price" value="99.9">
                                        </div>
                                        <div class="col-md-6"><label for="release_Date">Lanzamiento:</label>
                                            <input class="input" type="date" id="release_date" name="release_date" placeholder="">
                                        </div>
                                    </div>
    
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="platform">Plataforma:</label>
                                            <select class="input-select-3" name="platform" id="platform">
                                                <option value="0">Ps4</option>
                                                <option value="1">Xbox</option>
                                                <option value="2">Nint. Switch</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6"><label for="gender">Género:</label>
                                            <select class="input-select-3" name="gender" id="gender">
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
                                    
                                    <div class="row form-group text-left">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">  
                                                    <label for="stock">Stock:</label>
                                                </div>
                                                <div class="col-md-8">  
                                                    <input class="input" type="number" id="stock" name="stock" value="10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-4">  
                                                <label for="type_product">Tipo:</label>
                                            </div>
                                            <div class="col-md-8">  
                                                <select class="input-select-3 " name="type_product" id="type_product">
                                                    <option value="0">Físico</option>
                                                    <option value="1">Digital</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="image">Imagen:</label>
                                    <input type="file" id="image" name="image" maxlength="1000000" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <div class="product-details centrar-interno">
                            <div class="add-to-cart col-md-12">
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