<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href={{ asset("css/bootstrap.min.css")}}>
    <title>Document</title>
    <style>
      table {page-break-before:auto;}
    </style>
</head>
<body>
    <div class="container">
        <h1>Ranking de productos</h1>

        <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" scope="col">Id</th>
                <th class="text-center" scope="col">Nombre del producto</th>
                <th class="text-center" scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
                @for($i=0;$i<count($products);$i++)
                  <tr class="hover">
                    <td class="text-center" scope="row">{{$products[$i]->id}}</td>
                    <td class="text-center" >{{$products[$i]->name}} </td>
                    
                    @if($products[$i]->status=='0' || $products[$i]->status==0)
                    <td class="text-center" >Disponible</td>
                    @else
                    <td class="text-center" >Agotado</td>
                    @endif
                    
                  </tr>
                @endfor                
            </tbody>
          </table>

    </div>
</body>
</html>