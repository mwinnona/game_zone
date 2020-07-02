@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Reportes') </title>

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
                    <li class="active">REPORTES</li>
                    <li><a href="{{url('/ranking')}}">RANKING</a></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<div class="container">
    <h1 class="text-center">Reporte de Pedidos</h1>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Cliente</th>
            <th class="text-center" scope="col">Estado del Pedido</th>
            <th class="text-center" scope="col">Fecha del Pedido</th>
            <th class="text-center" scope="col">Total</th>
            <th class="text-center" scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @for($i=count($orders)-1;$i>=0;$i--)
            <tr class="hover">
            <th class="text-center" scope="row">N°000{{$orders[$i]->id}}</th>
            @for($j=0;$j<count($users);$j++)
            @if($users[$j]->id==$orders[$i]->id_user)
            <td class="text-center" >{{$users[$j]->name}} {{$users[$j]->lastname}}</td>
            @endif
            @endfor
            @if($orders[$i]->status=='0' || $orders[$i]->status==0)
            <td class="text-center" >ENVIADO</td>
            @elseif($orders[$i]->status=='1' || $orders[$i]->status==1)
            <td class="text-center" >PAGADO</td>
            @else
            <td class="text-center" >FINALIZADO</td>
            @endif
            <td class="text-center" >{{$orders[$i]->created_at}}</td>
            <td class="text-center" >S/. {{$orders[$i]->total_amount}}</td>
            <th class="text-center">
                <a href="{{URL('/report-order-view/'.$orders[$i]->token_order)}}"><span><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                <a href="{{URL('/factura/'.$orders[$i]->token_order)}}"><span><i class="fa fa-download" aria-hidden="true"></i></span></a>
            </th>
          </tr>
          @endfor
        </tbody>
    </table>
</div>

@endsection

@section('plugin')
@endsection