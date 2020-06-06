<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function show(){  
        $users= DB::select('call Consult_User()');
        return view('users.user', ['users' => $users]);
               
    }

    public function showAccount(){
        $users = User::where('id', Auth::user()->id)->first();  
        return view('users.account', ['users' => $users]);
         
    }

    public function createUser(Request $request){
        $token= new TokenController();
        //$password = new TokenController();
        $parameters=[];
        $tmp=[];
        $changes=0;
        if($request->name !=null || $request->name==null){
            $parameters['name'] = 'required|min:2|max:50';
            $tmp['name'] = $request->name;
            $changes++;
        }

        if($request->lastname !=null || $request->lastname ==null){
            $parameters['lastname'] = 'required|min:2|max:50';
            $tmp['lastname'] = $request->lastname;
            $changes++;
        }

        if($request->email!=null || $request->email==null){
            $parameters['email'] = 'required|email|unique:users';
            $tmp['email']=$request->email;
            $changes++;
        }

        if($request->newPassword!=null || $request->newPassword==null){
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
            return redirect () -> back () -> withInput () -> withErrors (['status' => 'fail',
            'e_email'=> $validar->errors()->first('email') ,
            'e_name'=> $validar->errors()->first('name'),
            'e_lastname'=> $validar->errors()->first('lastname'),
            'e_password' => $validar->errors()->first('password')]);


            
        }else{

            if ($changes >0) {
                $type_user=0;
               $status=0;
               $photo='users/default.png';
                $data = DB::select("call Add_User(?, ?, ?, ?, ?, ?, ?, ?)", array($request->name, $request->lastname, $request->email,
                 $status, $type_user, Hash::make($request->newPassword), $photo, $token->randomString(15)));
            }
            $users= DB::select('call Consult_User()');
            return view('users.user', ['users' => $users]);
            
        }
    }
    
    public function examinateUser($token){
        $users = User::where('token_user', $token)->first();  
        return view('users.account', ['users' => $users]);
    }
   


    public function updateUser(Request $request){
        $tmp=[];
        $user_bd= User::where('token_user', $request->token)->first();
        
        $name = $user_bd->name;
        $lastname = $user_bd->lastname;
        if($request->updateName!=null){
            if(!$name = $request->updateName){
             $parameters['name'] = 'required|min:2|max:50';
            $tmp['name'] = $request->updateName;  
            } 
        }else{
            $request->updateName=$name;
        }

        if($request->updateLastname!=null){
            if(!$lastname = $request->updateLastname){
            $parameters['lastname'] = 'required|min:2|max:50';
            $tmp['lastname'] = $request->updateLastname;
            }
        }else{
            $request->updateLastname=$lastname ;
        }

        if($request->email!=null){
            $parameters['email'] = 'required|email';
            $tmp['email']=$request->email;
        }else{
            $request->email=$user_bd->email;
        }

       
        /*if(!$request->file('updatePhoto') != null){
            $tmp['photo']=$request->file('updatePhoto');
            $parameters['photo']='mimes:jpeg,bmp,png,jpg';
        }*/

        $messages = [
            
            'email.required' =>'El email es obligatorio.',
            'email.email' =>'El correo no tiene el formato correcto.',
            'name.min' => 'El nombre debe tener como mínimo 2 caracteres.',
            'name.max' => 'El nombre debe tener como máximo 50 caracteres.',
            'name.required' => 'El nombre es obligatorio.',
            'lastname.min' => 'El apellido debe tener como mínimo 2 caracteres.',
            'lastname.max' => 'El apellido debe tener como máximo 50 caracteres.',
            'lastname.required' => 'El apellido es obligatorio.'
   
        ];

        $validar = Validator::make($tmp,$parameters,$messages);  
        if($validar->fails() ){
            return redirect () -> back () -> withInput () -> withErrors (['status' => 'fail',
            'e_email'=> $validar->errors()->first('email'),
            'e_name'=> $validar->errors()->first('name'),
            'e_lastname'=> $validar->errors()->first('lastname'),
            'e_lastname'=> $validar->errors()->first('lastname')

        }else{
            
                if ($request->file('updatePhoto') != null) {
                    $file = $request->file('updatePhoto');
                    $file_extension = $file->getClientOriginalExtension();
                    $aux_file = new TokenController();
                    $file_name      = $aux_file->randomString(15);
                    $name_file= $file_name.'.'.$file_extension;
                    $request->file('updatePhoto')->move('files/users/profiles/credits/', $name_file);
                    $tmp['photo'] = $name_file;

                    /*User::where('id', Auth::id())
                        ->update([$tmp]);*/
                    
                }else{
                    $request->updatePhoto=$user_bd->photo;
                }
                
                $users= DB::select('call Modify_User(?, ?, ?, ?, ?)', array($request->token, $request->updateName, $request->updateLastname, $request->email, $request->updatePhoto));
                dd('Aqui');
                    return view('users.');
            
        }

    }

    public function changeStatus($token){
        $user_bd = User::where('token_user', $token)->first();
        $status=0;
        if($user_bd->status==1 || $user_bd->status=='1'){
            $status=0;
        }else{
            $status=1;
        }
        $user = User::where('token_user', $token)->update(['status' => $status]); 
        $users= DB::select('call Consult_User()');
        return view('users.user', ['users' => $users]);

    }
  
    
}
