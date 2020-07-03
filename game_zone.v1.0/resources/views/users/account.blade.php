@extends('layouts.mainlayout')
@section('title', 'GAMEZONE - Cuenta') </title>

@section('css')
@endsection

@section('plugincss')
@section('style')
   
@endsection

@section('content')
<div class="section">
    <!-- container -->
    
    <form method ="POST" action ="{{url('/actualizar_user')}}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <!-- row -->
            <input class="form-control" type="hidden" id="token" name="token" value="{{$users['token_user']}}">
            
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <img src={{URL::asset($users['photo'])}} alt="" width="400" height="500">
                    <div class="form-group">
                        <label for="updatePhoto">Imagen:</label>
                        <input type="file" id="updatePhoto" name="updatePhoto" maxlength="1000000" accept="image/*" />
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                       <div class="col-4">
                        <label class="switch" >
                            <input type="checkbox" id="editarCheckbox">
                            <span class="slider round" ></span>
                          </label>
                        </div>
                        <div class="col"> <h5>Editar</h5></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="updateName">Nombre</label>
                                <input class="form-control" type="text" id="updateName" name="updateName" value="{{$users['name']}}">
                                @if($errors->first('e_name'))
                                    <span class="text-danger"  >
                                        {{ $errors->first('e_name')}}
                                    </span>                                           
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group ">
                                <label for="updateLastname">Apellido</label>
                                <input class="form-control" type="text" id="updateLastname" name="updateLastname" value="{{$users['lastname']}}">
                                @if($errors->first('e_lastname'))
                                    <span class="text-danger"  >
                                        {{ $errors->first('e_lastname')}}
                                    </span>                                           
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" id="email" name="email" value="{{$users['email']}}">
                                @if($errors->first('e_email'))
                                    <span class="text-danger"  >
                                        {{ $errors->first('e_email')}}
                                    </span>                                           
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="product-details">
                            <div class="col-md-12">
                                <br>
                                <div class="add-to-cart text-center">
                                    <button type="submit" class="add-to-cart-btn" id="editarButton" style="display:none">
                                        <i class="fa fa-arrow-circle-o-right">
                                        </i>Guadar cambios
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                    
                
            </div>
        </div>
    </form>
</div>
<!--SECTION-->
@endsection
@section('plugin')
    <script src={{ asset("js/users.js")}}></script>
  
@endsection