@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Ranking') </title>

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
                    <li><a href="{{url('/reporte-pedidos')}}">REPORTES</a></li>
                    <li class="active">RANKING</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<div class="container">
    <h1 class="text-center">Ranking de Ventas</h1>
    <br>
    <form method="POST" action="{{url('/filtro')}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <label for="platform">Plataforma:</label>
            <select class="form-control" name="platform" id="platform">
                <option value="0" selected>Todos</option>
                <option value="1">Play Station</option>
                <option value="2">Xbox</option>
                <option value="3">Nintendo</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="mes">Mes:</label>
            <select class="form-control" name="month" id="month">
                <option value="0" selected>Todos</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="año">Año:</label>
            <select class="form-control" name="year" id="year">
                <option value="2020" selectd>2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>
        <div class="col-md-3">
            <div class="product-details centrar-interno">
                <div class="add-to-cart col-md-6">
                    <button type="submit" class="add-to-cart-btn" ><i class="fa fa-filter"></i>Filtrar</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <br>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Nombre</th>
            <th class="text-center" scope="col">Plataforma</th>
            <th class="text-center" scope="col">Cantidad Vendida</th>
            <th class="text-center" scope="col">Importe Total</th>
          </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($products);$i++)
            <tr class="hover">
            <th class="text-center" scope="row">N°{{$i+1}}</th>
            <td class="text-center" >{{$products[$i]->name}}</td>
            @if($products[$i]->plataform=='1' || $products[$i]->plataform=='1')
            <td class="text-center" >PLAY STATION</td>
            @elseif($products[$i]->plataform=='2' || $products[$i]->plataform=='2')
            <td class="text-center" >XBOX</td>
            @else
            <td class="text-center" >NINTENDO</td>
            @endif
            <td class="text-center" >{{$products[$i]->stock}}</td>
            <td class="text-center" >S/. {{$products[$i]->price}}</td>
          </tr>
          @endfor
        </tbody>
    </table>
</div>

@endsection

@section('plugin')
@endsection