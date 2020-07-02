@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Crear producto') </title>

@section('css')
@endsection

@section('plugincss')
@section('style')
   
@endsection


@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <form method ="POST" action ="{{url('/buscar_producto')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="aside">
                            <h3 class="aside-title">Plataforma</h3>
                            <div class="checkbox-filter">

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1" name="cat_1">
                                    <label for="category-1">
                                        <span></span>
                                        Play Station 4
                                        <small>(120)</small>
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-2" name="cat_2">
                                    <label for="category-2">
                                        <span></span>
                                    Xbox 
                                        <small>(740)</small>
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-3" name="cat_3">
                                    <label for="category-3">
                                        <span></span>
                                        Nintento switch
                                        <small>(1450)</small>
                                    </label>
                                </div>

                                
                            </div>
                        </div>

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Versión</h3>
                            <div class="checkbox-filter">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="type-1" name="type_1">
                                    <label for="type-1">
                                        <span></span>Físico<small></small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="type-2" name="type_2">
                                    <label for="type-2">
                                        <span></span>Digital<small></small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <!--<div class="aside">
                            <h3 class="aside-title">Price</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input id="price-min" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>-->
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Precios</h3>
                            <div class="checkbox-filter">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="price-1" name="price_1">
                                    <label for="price-1">
                                        <span></span>S/. 0.00 - S/. 9.99<small></small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="price-2" name="price_2">
                                    <label for="price-2">
                                        <span></span>S/. 9.99 - S/. 19.99<small></small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="price-3" name="price_3">
                                    <label for="price-3">
                                        <span></span>S/. 19.99 - S/. 59.99<small></small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="price-4" name="price_4">
                                    <label for="price-4">
                                        <span></span>S/. 59.99 - S/. 99.99<small></small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Genero</h3>
                            <div class="checkbox-filter">
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-1" name="gen_1">
                                    <label for="brand-1">
                                        <span></span>
                                        Aventura
                                        <small>(578)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-2" name="gen_2">
                                    <label for="brand-2">
                                        <span></span>
                                        Estrategia
                                        <small>(125)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-3" name="gen_3">
                                    <label for="brand-3">
                                        <span></span>
                                        Shooters
                                        <small>(755)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-4" name="gen_4">
                                    <label for="brand-4">
                                        <span></span>
                                        Lucha
                                        <small>(578)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-5" name="gen_5">
                                    <label for="brand-5">
                                        <span></span>
                                        RPG
                                        <small>(125)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-6" name="gen_6">
                                    <label for="brand-6">
                                        <span></span>
                                        ARPG
                                        <small>(755)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-7" name="gen_7">
                                    <label for="brand-7">
                                        <span></span>
                                        Plataformas
                                        <small>(755)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-8" name="gen_8">
                                    <label for="brand-8">
                                        <span></span>
                                        Simulacion
                                        <small>(755)</small>
                                    </label>
                                </div>
                                <div class="input-checkbox">
                                    <input type="checkbox" id="brand-9" name="gen_9">
                                    <label for="brand-9">
                                        <span></span>
                                        Survival Horror
                                        <small>(755)</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <div class="aside">
                            <div class="product-details">
                                <div class="add-to-cart">
                                    <div class="centrar-interno">
                                        <button type="submit" class="add-to-cart-btn" >
                                            <i class="fa fa-arrow-up">
                                            </i>Enviar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">LOS MÁS VENDIDOS</h3>
                        

                        <div class="product-widget">
                            <div class="product-img">
                                <img src={{URL::asset('./img/mega_man_zero_zx_zero_1.jpg')}} alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Plataforma</p>
                                <h3 class="product-name"><a href="#">Play Station 4</a></h3>
                                <h4 class="product-price">$/159.90 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src={{URL::asset('./img/nioh_2_ps4.jpg')}} alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Plataforma</p>
                                <h3 class="product-name"><a href="#">Play Station 4</a></h3>
                                <h4 class="product-price">$/149.90.00 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    @if (isset(Auth::user()->id))
                    @if (Auth::user()->type_user==0)
                    <div class="row">
                        <div class="container col-md-6 col-md-push-7">
                            <div class="product-details">
                                <div class="add-to-cart">
                                    <div class="centrar-interno">
                                        <button type="button" class="add-to-cart-btn" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-arrow-up">
                                            </i>Agregar Producto
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                    </div>
                    @endif
                    @endif
=======

                        <form method ="GET" action ="{{url('/downloadproducts')}}" >
                            @csrf
                            <div class="container col-md-6 col-md-push-7">
                                <div class="product-details">
                                    <div class="add-to-cart">
                                        <div class="centrar-interno">
                                            <button type="submit" class="add-to-cart-btn" formtarget="blank">
                                                <i class="fa fa-arrow-up">
                                                </i>Descarga PDF
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        
>>>>>>> 62f674f6afbcbeb972a217e1e777d2b903580c7e
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @if(count($products)==0)
                        <h2>No se encontro ningun producto</h2>-
                        @else
                        @if (isset(Auth::user()->id) && Auth::user()->type_user==0)
                        @for ($i=0;$i<count($products);$i++)
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src={{URL::asset($products[$i]->image)}} alt="" width="100" height="350">
                                    @if($products[$i]->stock==0)
                                    <div class="product-label">
                                        <!--<span class="sale">-30%</span>-->
                                        <span class="new">AGOTADO</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Plataforma</p>
                                    @if ($products[$i]->plataform=='1')
                                        <h3 class="product-name"><a href="#">Play Station 4</a></h3>
                                    @elseif ($products[$i]->plataform=='2')
                                        <h3 class="product-name"><a href="#">Xbox</a></h3>
                                    @else 
                                        <h3 class="product-name"><a href="#">Nintento Switch</a></h3>
                                    @endif
                                    <h4 class="product-price">S/. {{$products[$i]->price}} <del class="product-old-price">$990.00</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h3 class="product-name">{{$products[$i]->name}}</h3>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                        <a class="quick-view" href="{{URL('/ver_producto/'.$products[$i]->token_product)}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    @if(isset(Auth::user()->id))
                                    <a onclick="add()" href="{{URL('/agregar_carrito/'.$products[$i]->token_product)}}">
                                        <button type="submit"class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                    </a>
                                    @else
                                    <a onclick="reLogin()">
                                        <button type="submit"class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endfor

                        @else
                        @for ($i=0;$i<count($products);$i++)
                        @if($products[$i]->status==0 || $products[$i]->status=='0')
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src={{URL::asset($products[$i]->image)}} alt="" width="100" height="350">
                                    <div class="product-label">
                                        <span class="sale">-30%</span>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Plataforma</p>
                                    @if ($products[$i]->plataform=='1')
                                        <h3 class="product-name"><a href="#">Play Station 4</a></h3>
                                    @elseif ($products[$i]->plataform=='2')
                                        <h3 class="product-name"><a href="#">Xbox</a></h3>
                                    @else 
                                        <h3 class="product-name"><a href="#">Nintento Switch</a></h3>
                                    @endif
                                    <h4 class="product-price">S/. {{$products[$i]->price}} <del class="product-old-price">$990.00</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h3 class="product-name">{{$products[$i]->name}}</h3>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                        <a class="quick-view" href="{{URL('/ver_producto/'.$products[$i]->token_product)}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    @if(isset(Auth::user()->id))
                                    <a onclick="add()" href="{{URL('/agregar_carrito/'.$products[$i]->token_product)}}">
                                        <button type="submit"class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                    </a>
                                    @else
                                    <a onclick="reLogin()">
                                        <button type="submit"class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>add to cart</button>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @endfor

                        @endif
                        @endif

                       <!--<h2>No se encontro ningun producto</h2>-->

                        
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h2 class="modal-title" id="exampleModalLabel">Agregar Producto</h2>
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
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Ejemplo: Final Fantasy XV Royal Edition 2018" value="{{ old('name') }}">
                                    @if($errors->first('e_name'))
                                        <span class="text-danger"  >
                                            {{ $errors->first('e_name')}}
                                        </span>                                           
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="form-control" type="text" id="description" name="description" placeholder="Describe el producto" value="{{ old('description') }}"></textarea>
                                    @if($errors->first('e_decription'))
                                        <span class="text-danger"  >
                                            {{ $errors->first('e_decription')}}
                                        </span>                                           
                                    @endif
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="price">Precio:</label>
                                        <input class="form-control" type="number" id="price" name="price" placeholder="49.90" value="{{ old('price') }}">
                                        @if($errors->first('e_price'))
                                        <span class="text-danger"  >
                                            {{ $errors->first('e_price')}}
                                        </span>                                           
                                    @endif
                                    </div>
                                    <div class="col-md-6"><label for="release_Date">Lanzamiento:</label>
                                        <input class="form-control" type="date" id="release_date" name="release_date" placeholder="" value="{{ old('release_date') }}">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="platform">Plataforma:</label>
                                        <select class="form-control" name="platform" id="platform">
                                            <option value="1">Ps4</option>
                                            <option value="2">Xbox</option>
                                            <option value="3">Nint. Switch</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6"><label for="gender">Género:</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="1">Aventura</option>
                                            <option value="2">Shooters</option>
                                            <option value="3">Estrategia</option>
                                            <option value="4">Lucha</option>
                                            <option value="5">RPG</option>
                                            <option value="6">ARPG</option>
                                            <option value="7">Plataformas</option>
                                            <option value="8">Survival Horror</option>
                                            <option value="9">Simulación</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="stock">Stock:</label>
                                        <input class="form-control" type="number" id="stock" name="stock" value="10">
                                    </div>
                                    <div class="col-md-6"><label for="type_product">Tipo:</label>
                                        <select class="form-control" name="type_product" id="type_product">
                                            <option value="1">Físico</option>
                                            <option value="0">Digital</option>
                                        </select>
                                    </div>
                                </div>
                                
                              
                                <div class="form-group">
                                    <label for="image">Imagen:</label>
                                    <input type="file" id="image" name="image" maxlength="1000000" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <div class="product-details centrar-interno">
                        <div class="add-to-cart col-md-6">
                            <button data-target="#mensaje" type="button" class="add-to-cart-btn" data-dismiss="modal"><i class="fa fa-close"></i>Cerrar</button>
                        </div>
                        <div class="add-to-cart col-md-6">
                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-cloud-upload" ></i>Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>
    
    <!-- Modal -->
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
          El producto ah sido añadido de manera exitosa
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.4/sweetalert2.min.css">
<script src={{ asset("js/products.js")}}></script>
<script>
     function add(){
        var a = confirm('Hemos añadido el Juego al carrito, ¿Quieres ir al carrito?');
        if(a==true){
            window.location="{{URL::to('cart')}}" 
        }
    }
    function reLogin(){
        var r = confirm('No puedes añadir ningun juego al carrito sin antes iniciar sesión, ¿Quieres que te redirijamos al login?');
        if(r==true){
            window.location="{{URL::to('login')}}";
        }
    }
</script>
<script>  

    @if($errors->first('status'))
    $("#exampleModal").modal("show");
    @endif
</script>   


@endsection