<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function listarUser(){
        DB::select('call Consult_User()');
    }

    public function agregarUsuario(Request $request){
        $data = DB::select("call Add_User(?, ?, ?, ?, ?, ?, ?, ?)", array($request->name, $request->lastname, $request->email,
        $status, $type_user, Hash::make($request->password), $photo, $token->randomString(15)));
    }

    public function editarUsuario(Request $request){
        $data = DB::select("call Edit_User(?, ?, ?, ?, ?, ?, ?)", array($request->name, $request->lastname, $request->email,
        $status, $type_user, Hash::make($request->password), $photo));
    }


    public function eliminarProducto(Request $request){
        DB::select('call Delete_User(?)', array($request->token_producto));
    }
}
