

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
							<li class="active">{{$products['name']}}</li>
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
                                <img src={{URL::asset($products['image'])}} alt="">
                            </div>
						</div>
                    </div>

					<!-- Product details -->
					<div class="col-md-6 col-md-push-1">
                    @if (isset(Auth::user()->id))
                        @if (Auth::user()->type_user==0)
                            <div class="row">
                                <div class="col-4">
                                <label class="switch" >
                                    <input type="checkbox" id="editarCheckboxProduct">
                                    <span class="slider round" ></span>
                                </label>
                                </div>
                                <div class="col"> <h5>Editar</h5></div>
                            </div>
                        @endif
                    @endif

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
                                            @if($products['plataform']==1)
                                                <h4 class="texto-playStation" id="plataform" name="plataform">PS4</h4>
                                            @elseif($products['plataform']==2)
                                                <h4 class="texto-xbox" id="plataform" name="plataform">Xbox</h4>
                                            @else
                                                <h4 class="texto-nintendo" id="plataform" name="plataform">Nintento</h4>
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
                                            @if($products['gender']==1)
                                                <h4 class="texto-normal-gray" id="gender" name="gender">Aventura</h4>
                                            @elseif($products['gender']==2)
                                                <h4 class="texto-normal-gray" id="gender" name="gender">Estrategia</h4>
                                            @elseif($products['gender']==3)
                                                <h4 class="texto-normal-gray" id="gender" name="gender">Shooters</h4>
                                            @elseif($products['gender']==4)
                                                <h4 class="texto-normal-gray" id="gender" name="gender">Lucha</h4>
                                            @elseif($products['gender']==5)
                                                <h4 class="texto-normal-gray" id="gender" name="gender">RPG</h4>
                                            @elseif($products['gender']==6)
                                                <h4 class="texto-normal-gray" id="gender" name="gender">ARPG</h4>
                                            @elseif($products['gender']==7)
                                                <h4 class="texto-normal-gray" id="gender" name="gender">Plataformas</h4>
                                            @elseif($products['gender']==8)
                                                <h4 class="texto-normal-gray" id="gender" name="gender">Simulación</h4>
                                            @else
                                                <h4 class="texto-normal-gray" id="gender" name="gender">Survival Horror</h4>
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
                                            <h4 class="texto-normal-red" id="type_product" name="type_product">Digital</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (isset(Auth::user()->id))
                            @if (Auth::user()->type_user==0)
                            <br>
                            <div class="product-options text-center">
                                <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Estado: </label>
                                    </div>
                                    <div class="col-md-7">
                                        @if($products['status']==0)
                                        <h4 class="texto-normal-gray" id="status" name="status">En Stock</h4>
                                        @else
                                        <h4 class="texto-normal-gray" id="status" name="status">Agotado</h4>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endif
                            @endif
                            <br>
                            <div class="col-md-12">
                                <br>
                                <div class="add-to-cart text-center">
                                    <button type="button" class="add-to-cart-btn" data-toggle="modal" data-target="#exampleModal" style="display:none" id="editarButton">
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
        <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h2 class="modal-title" id="exampleModalLabel">Modificar Producto</h2>
                </div>-->
                <form method ="POST" action ="{{url('/modificar_producto')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!--Nuevo Producto-->
                    
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="product-details">
                                    
                                    <div class="form-group ">
                                        <input class="form-control" type="hidden" id="token" name="token" value="{{$products['token_product']}}">
                                        <label for="name">Nombre Completo del Producto:</label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{$products['name']}}">
                                        @if($errors->first('e_name'))
                                        <span class="text-danger"  >
                                            {{ $errors->first('e_name')}}
                                        </span>                                           
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea class="form-control" type="text" id="description" name="description" >{{$products['description']}}</textarea>
                                        @if($errors->first('e_decription'))
                                        <span class="text-danger">
                                            {{ $errors->first('e_decription')}}
                                        </span>                                           
                                        @endif
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
                                            <select class="form-control" name="plataform" id="plataform">
                                                @if($products['plataform']==1)
                                                <option value="1" selected>Ps4</option>
                                                @else 
                                                <option value="1">Ps4</option>
                                                @endif

                                                @if($products['plataform']==2)
                                                <option value="2" selected>Xbox</option>
                                                @else 
                                                <option value="2">Xbox</option>
                                                @endif

                                                @if($products['plataform']==3)
                                                <option value="3" selected>Nint. Switch</option>
                                                @else 
                                                <option value="3">Nint. Switch</option>
                                                @endif

                                            </select>
                                        </div>
                                        <div class="col-md-6"><label for="gender">Género:</label>
                                            <select class="form-control" name="gender" id="gender">

                                                @if($products['gender']==1)
                                                <option value="1" selected>Aventura</option>
                                                @else 
                                                <option value="1">Aventura</option>
                                                @endif

                                                @if($products['gender']==2)
                                                <option value="2" selected>Estrategia</option>
                                                @else 
                                                <option value="2">Estrategia</option>
                                                @endif


                                                @if($products['gender']==3)
                                                <option value="3" selected>Shooters</option>
                                                @else 
                                                <option value="3">Shooters</option>
                                                @endif

                                                @if($products['gender']==4)
                                                <option value="4" selected>Lucha</option>
                                                @else 
                                                <option value="4">Lucha</option>
                                                @endif

                                                @if($products['gender']==5)
                                                <option value="5" selected>RPG</option>
                                                @else 
                                                <option value="5">RPG</option>
                                                @endif

                                                @if($products['gender']==6)
                                                <option value="6" selected>ARPG</option>
                                                @else 
                                                <option value="6">ARPG</option>
                                                @endif

                                                @if($products['gender']==7)
                                                <option value="7" selected>Plataformas</option>
                                                @else 
                                                <option value="7">Plataformas</option>
                                                @endif

                                                @if($products['gender']==8)
                                                <option value="8" selected>Simulación</option>
                                                @else 
                                                <option value="8">Simulación</option>
                                                @endif

                                                @if($products['gender']==9)
                                                <option value="9" selected>Survival Horror</option>
                                                @else 
                                                <option value="9">Survival Horror</option>
                                                @endif
                               
                                            </select>
                                        </div>
                                    </div>
    
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="stock">Stock:</label>
                                            <input class="form-control" type="number" id="stock" name="stock" value="{{$products['stock']}}">
                                        </div>
                                        <div class="col-md-6"><label for="type_product">Tipo:</label>
                                            <select class="form-control" name="type_product" id="type_product">
                                                @if($products['type_product']==0)
                                                <option value="0" selected>Físico</option>
                                                @else 
                                                <option value="0">Físico</option>
                                                @endif

                                                @if($products['type_product']==1)
                                                <option value="1" selected>Digital</option>
                                                @else 
                                                <option value="1">Digital</option>
                                                @endif
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
              <!--</div>
            </div>
        </div>-->

        <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Mensaje de Validación</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Existen campos vacíos, el producto no se ah modificado.
                </div>
                <div class="modal-footer centrar-interno">
                    <div class="product-details">
                        <div class="add-to-cart col-md-6">
                            <button data-target="#mensaje" type="button" class="add-to-cart-btn" data-dismiss="modal"><i class="fa fa-close"></i>Cerrar</button>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>-->
@endsection
@section('plugin')
    <script src={{ asset("js/products.js")}}></script>
    <script>
        @if($errors->first('status'))
        $("#exampleModal").modal("show");
        @endif
    </script>
@endsection