<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Factura Electrónica</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center">RANKING DE PRODUCTOS VENDIDOS</h2>
        @if(isset($fechaInicial) && isset($fechaFinal) && isset($platform))
        <br>
        <h4>Fecha:  {{$fechaInicial}}  a  {{$fechaFinal}}</h4>
        @if($platform==1)
        <h4>Plataforma:  Play Station</h4>
        @elseif($platform==2)
        <h4>Plataforma:  XBOX</h4>
        @elseif($platform==3)
        <h4>Plataforma:  Nintendo</h4>
        @else
        @endif
        <br>
        @endif
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col" style="width: 200px;">Nombre</th>
                    <th class="text-center" scope="col">Plataforma</th>
                    <th class="text-center" scope="col">Cantidad Vendida</th>
                    <th class="text-center" scope="col">Importe Total</th>
                  </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<count($products);$i++)
                    <tr class="hover">
                    <th class="text-center" scope="row">N°{{$i+1}}</th>
                    <td class="text-center" style="width: 200px;">{{$products[$i]->name}}</td>
                    @if($products[$i]->plataform=='1' || $products[$i]->plataform=='1')
                    <td class="text-center" >PLAY STATION</td>
                    @elseif($products[$i]->plataform=='2' || $products[$i]->plataform=='2')
                    <td class="text-center" >XBOX</td>
                    @else
                    <td class="text-center" >NINTENDO</td>
                    @endif
                    <td class="text-center" >{{$products[$i]->stock}}</td>
                    <td class="text-center" style="width: 100px;">S/. {{$products[$i]->price}}</td>
                  </tr>
                  @endfor
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>