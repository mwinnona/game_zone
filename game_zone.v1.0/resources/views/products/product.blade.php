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
                    <div class="aside">
                        <h3 class="aside-title">Plataforma</h3>
                        <div class="checkbox-filter">

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-1">
                                <label for="category-1">
                                    <span></span>
                                    Play Station 4
                                    <small>(120)</small>
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-2">
                                <label for="category-2">
                                    <span></span>
                                Xbox 
                                    <small>(740)</small>
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-3">
                                <label for="category-3">
                                    <span></span>
                                    Nintento switch
                                    <small>(1450)</small>
                                </label>
                            </div>

                            
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
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
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Genero</h3>
                        <div class="checkbox-filter">
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-1">
                                <label for="brand-1">
                                    <span></span>
                                    Aventura
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-2">
                                <label for="brand-2">
                                    <span></span>
                                    Estrategia
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-3">
                                <label for="brand-3">
                                    <span></span>
                                    Shooters
                                    <small>(755)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-4">
                                <label for="brand-4">
                                    <span></span>
                                    Lucha
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-5">
                                <label for="brand-5">
                                    <span></span>
                                    RPG
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-6">
                                <label for="brand-6">
                                    <span></span>
                                    ARPG
                                    <small>(755)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-6">
                                <label for="brand-6">
                                    <span></span>
                                    Plaataformas
                                    <small>(755)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-6">
                                <label for="brand-6">
                                    <span></span>
                                    Simulacion
                                    <small>(755)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-6">
                                <label for="brand-6">
                                    <span></span>
                                    Survival Horror
                                    <small>(755)</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">LOS MÁS VENDIDOS</h3>
                        

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/mega_man_zero_zx_zero_1.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Plataforma</p>
                                <h3 class="product-name"><a href="#">Play Station 4</a></h3>
                                <h4 class="product-price">$/159.90 <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/nioh_2_ps4.jpg" alt="">
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
                    <div class="row">
                        <div class="container col-md-6 col-md-push-8">
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
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @for ($i=0;$i<count($products);$i++)
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{$products[$i]['image']}}" alt="">
                                    <div class="product-label">
                                        <span class="sale">-30%</span>
                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Plataforma</p>
                                    @if ($products[$i]['platform']=='0')
                                        <h3 class="product-name"><a href="#">Play Station 4</a></h3>
                                    @elseif ($products[$i]['platform']=='1')
                                        <h3 class="product-name"><a href="#">Xbox</a></h3>
                                    @else 
                                        <h3 class="product-name"><a href="#">Nintento Switch</a></h3>
                                    @endif
                                    <h4 class="product-price">S/. {{$products[$i]['price']}} <del class="product-old-price">$990.00</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                        <a class="quick-view" href='{{URL('/modificar_usuarios')}}/"+data.users[i]['token']+"'><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                        @endfor


                       

                        
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
              <h2 class="modal-title" id="exampleModalLabel">Detalles del Producto</h2>
            </div>
            <form method ="POST" action ="{{url('/crear_producto')}}">
                @csrf
                <div class="modal-body">
                    <!--Nuevo Producto-->
                
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="product-details">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="id_product">Código de Producto:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="input" type="text" id="id_product" placeholder="###############">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="name">Nombre Completo del Producto:</label>
                                    <input class="input" type="text" id="name" name="name" placeholder="Ejemplo: Final Fantasy XV Royal Edition 2018">
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea class="input" type="text" id="description" name="description" placeholder="Describe el producto"></textarea>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="release_Date">Fecha de Lanzamiento:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="input" type="date" id="release_date" name="release_date" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>
                                            Plataforma:
                                            <select class="input-select-3" name="platform">
                                                <option value="0">Ps4</option>
                                                <option value="1">Xbox</option>
                                                <option value="2">Nint. Switch</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>
                                            Género:
                                            <select class="input-select-3" name="gender">
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
                                        </label>
                                    </div>
                                </div>
                                <div class="centrar-interno">
                                    <div class="add-to-cart">
                                        <div class="qty-label">
                                            Stock:
                                            <div class="input-number">
                                                <input type="number" name="stock" value="10">
                                                <span class="qty-up">+</span>
                                                <span class="qty-down">-</span>
                                            </div>
                                        </div>
                                        <div class="qty-label">
                                            Tipo:
                                            <select class="input-select-2" name="type_product">
                                                <option value="0">Físico</option>
                                                <option value="1">Digital</option>
                                            </select>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <div class="product-details centrar-interno">
                        <div class="add-to-cart col-md-6">
                            <button type="button" class="add-to-cart-btn" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
                        </div>
                        <div class="add-to-cart col-md-6">
                            <button type="submit" class="add-to-cart-btn"><i class="fa fa-cloud-upload"></i>Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>



          </div>
        </div>
    </div>
    

    
@endsection
@section('plugin')
   
@endsection