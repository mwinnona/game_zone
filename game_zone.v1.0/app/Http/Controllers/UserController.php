<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function show()
    {   
              
        //$users = Auth::user()->first();
         return view('users.user');
               
    }

    public function createUser(Request $request){
        $token= new TokenController();
        $password = new TokenController();
        $tmp=[];
        $changes=0;
        if(!$request->name==null){
            $parameters['name'] = 'required|min:2|max:50';
            $tmp['name'] = $request->name;
            $changes++;
        }

        if(!$request->lastname==null){
            $parameters['lastname'] = 'required|min:2|max:50';
            $tmp['lastname'] = $request->lastname;
            $changes++;
        }

        if(!$request->email==null){
            $parameters['email'] = 'required|email';
            $tmp['email']=$request->email;
            $changes++;
        }

        if(!$request->newPassword==null){
            if($request->newPassword == $request->confirmPassword){
                $parameters['password'] = 'required|min:8|max:15';
                $tmp['password']=$request->newPassword;
                $changes++;
            }
        }

        $messages = [
            'name.min' => 'El nombre debe tener como mínimo 2 caracteres.',
            'name.max' => 'El nombre debe tener como máximo 50 caracteres.',
            'name.required' => 'El nombre es obligatorio.',
            'password.min' => 'La contraseña debe tener como mínimo 8 caracteres.',
            'password.max' => 'La contraseña debe tener como máximo 15 caracteres.',
            'password.required' => 'La contraseña es obligatorio.',
            'email.required' =>'El email es obligatorio.',
            'email.email' =>'El correo no tiene el formato correcto.',
        ];

        $validar = Validator::make($tmp,$parameters,$messages);  
        if($validar->fails() ){
            return response()->json(array(
                'status' => 'fail',
                'e_email'=> $validar->errors()->first('email') ,
                'e_name'=> $validar->errors()->first('name'),
                'e_lastname'=> $validar->errors()->first('lastname'),
                'e_password' => $validar->errors()->first('password')
            ),200);
        }else{
            if ($changes >0) {
                $user = new User;
                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->email = $request->email;
                $user->status = 1;
                $user->type_user=$request->typeUser;
                $user->photo='default.png';
                $user->password= Hash::make($request->newPassword);
                $user->token_user=$token->randomString(15);
                $user->save();
                return response()->json(array(
                    'status' => 'ok',
                    ), 200);
            }else{
                return response()->json(array(
                    'status' => 'normal',
                    ), 200);
            }
            
        }
    }

    public function updateUser(Request $request){
        $tmp=[];
        $changes=0;
        if(!$request->updateName==null){
            $parameters['name'] = 'required|min:2|max:50';
            $tmp['name'] = $request->updateName;
            $changes++;
        }

        if(!$request->updateLastname==null){
            $parameters['lastname'] = 'required|min:2|max:50';
            $tmp['lastname'] = $request->updateLastname;
            $changes++;
        }

        if($request->file('updatePhoto') != null){
            $tmp['photo']=$request->file('updatePhoto');
            $parameters['photo']='mimes:jpeg,bmp,png,jpg';
        }

        $messages = [
            'name.min' => 'El nombre debe tener como mínimo 2 caracteres.',
            'name.max' => 'El nombre debe tener como máximo 50 caracteres.',
            'name.required' => 'El nombre es obligatorio.'
            
        ];

        $validar = Validator::make($tmp,$parameters,$messages);  
        if($validar->fails() ){
            return response()->json(array(
                'status' => 'fail',
                'e_name'=> $validar->errors()->first('name'),
                'e_lastname'=> $validar->errors()->first('lastname'),
                'e_photo'=> $validar->errors()->first('photo')
            ),200);
        }else{
            if ($changes >0) {
                if ($request->file('updatePhoto') != null) {
                    $file = $request->file('updatePhoto');
                    $file_extension = $file->getClientOriginalExtension();
                    $aux_file = new TokenController();
                    $file_name      = $aux_file->randomString(15);
                    $name_file= $file_name.'.'.$file_extension;
                    $request->file('updatePhoto')->move('files/users/profiles/credits/', $name_file_credits);
                    $tmp['photo'] = $name_file;

                    User::where('id', Auth::id())
                        ->update([$tmp]);
                }
            }
        }

    }
  
    
}
