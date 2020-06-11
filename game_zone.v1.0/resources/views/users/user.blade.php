

@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Trabajadores') </title>

@section('css')
@endsection

@section('plugincss')
@section('style')
   
@endsection

@section('content')


<!--SECTION-->
<div class="section">
    <div class="container">
        <div class="row">
                <div class="col-12">
                    <div class="product-details">
                        <div class="add-to-cart">
                            <div class="centrar-interno ">
                                <button type="button" class="add-to-cart-btn" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-user-plus">
                                    </i>Registrar Usuario
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th class="text-center" scope="col">Nombre Completo</th>
                <th class="text-center" scope="col">E-Mail</th>
                <th class="text-center" scope="col">Rol</th>
                <th class="text-center" scope="col">Estado</th>
                <th class="text-center" scope="col">Administrar</th>
              </tr>
            </thead>
            <tbody>
                @for($i=0;$i<count($users);$i++)
              <tr class="hover">
                <th class="text-center" scope="row"></th>
                <td class="text-center" >{{$users[$i]->name}} {{$users[$i]->lastname}}</td>
                <td class="text-center" >{{$users[$i]->email}}</td>
                @if($users[$i]->type_user=='0')
                <td class="text-center" >Administrador</td>
                @elseif($users[$i]->type_user=='1')
                <td class="text-center" >Asistente</td>
                @endif
                @if($users[$i]->status=='0' || $users[$i]->status==0)
                <td class="text-center" >ACTIVO</td>
                @else
                <td class="text-center" >INACTIVO</td>
                @endif
                <th>
                    <a href="{{URL('/examinar_user/'.$users[$i]->token_user)}}"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                    <a href="{{URL('/eliminar_user/'.$users[$i]->token_user)}}">
                        <span>
                            @if($users[$i]->status=='0' || $users[$i]->status==0)
                            <i class="fa fa-window-close-o" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            @endif
                        </span></a>
                </th>
              </tr>
              @endfor
            </tbody>
          </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h2 class="modal-title" id="exampleModalLabel">Registrar Usuario</h2>
        </div>
        <form method ="POST" action ="{{url('/crear_usuario')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="product-details">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="name">Nombres:</label>
                                <input class="form-control" type="hidden" id="type" name="type" placeholder="0" value="0">
                                <input class="form-control" type="text" id="name" name="name" placeholder="Nombres">
                                @if($errors->first('e_name'))
                                    <span class="text-danger"  >
                                        {{ $errors->first('e_name')}}
                                    </span>                                           
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">Apellidos:</label>
                                <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Apellidos">
                                @if($errors->first('e_lastname'))
                                    <span class="text-danger"  >
                                        {{ $errors->first('e_lastname')}}
                                    </span>                                           
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input class="form-control" type="text" id="email" name="email" placeholder="Ingrese su E-mail">
                            <small id="emailHelp" class="form-text text-muted">No compartiremos su correo con nadie más.</small>
                            @if($errors->first('e_name'))
                                <span class="text-danger"  >
                                    {{ $errors->first('e_email')}}
                                </span>                                           
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Digíte su contraseña">
                            <small id="emailHelp" class="form-text text-muted">Use una combinación alfanumérica para que tu clave sea más segura.</small>
                            
                        </div>
                        <div class="form-group">
                            <label for="repeat_password">Repetir Contraseña:</label>
                            <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Repita la contraseña">
                            @if($errors->first('e_password'))
                                <span class="text-danger"  >
                                    {{ $errors->first('e_password')}}
                                </span>                                           
                            @endif
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
                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-user" ></i>Guardar Cambios</button>
                </div>
            </div>
        </div>
       </form>
      </div>
    </div>
  </div>

  <!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Modificar Usuario</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="product-details">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="platform">Rol:</label>
                                <select class="form-control" name="platform" id="platform">
                                    <option value="0">Administrador</option>
                                    <option value="1">Asistente</option>
                                </select>
                            </div>
                            <div class="col-md-6"><label for="gender">Estado:</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="0">ACTIVO</option>
                                    <option value="1">INACTIVO</option>
                                </select>
                            </div>
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
                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-user" ></i>Guardar Cambios</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<!--SECTION-->
@endsection
@section('plugin')

<script>
    
    $(document).ready(function(){
      
    });


    //var formData = new FormData();
    //formData.append("username", "Groucho");
    function productos(){
       
        $.ajax({
            url: '/producto_ajax',
            method: "GET",
            dataType: 'JSON',
            data: new FormData(),
            success:function(data){

            },
            error:function(xhr, desc, err){
                console.log('error');
            }
        });

    }

    @if($errors->first('status'))
    $("#exampleModal").modal("show");
    @endif
    
</script>
   
@endsection