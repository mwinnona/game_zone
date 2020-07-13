<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Product extends Model
{
    protected $table = 'products';

    public function listarProducto(){
        DB::select('call Consult_Product()');
    }

    public function agregarProducto(Request $request){
        $data = DB::select("call Add_Product(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($request->name, $description, $request->type_product,
        $request->platform, $request->gender, $request->price, $tmp_image, $request->release_date, $status,
        $request->stock, $token->randomString(15)));
    }

    public function editarProducto(Request $request){
        $data = DB::select("call Edit_Product(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($request->name, $description, $request->type_product,
        $request->platform, $request->gender, $request->price, $tmp_image, $request->release_date, $status,
        $request->stock));
    }


    public function eliminarProducto(Request $request){
        DB::select('call Delete_Product(?)', array($request->token_producto));
    }
}
