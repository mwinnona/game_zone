<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use App\Product;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {      
        
        //$products=Product::all();
        $products= DB::select('call Consult_Product()');
         return view('products.product', ['products' => $products]);       
    }

    public function showAjax(){
        
        return \response()->json([
            'status' => 'success'
        ]);
    }
    
    public function createProduct(Request $request){     
       
        $token= new TokenController();
        $parameters=[];
        $tmp=[];
        
        $parameters['name'] = 'required|min:2|max:115';
        $tmp['name'] = $request->name;
        $description= $request->description;
        if($description!=null){
            
            $parameters['description'] = 'required|min:2|max:400';
            $tmp['description'] = $description;
            
        }
        
        $messages = [
            'name.min' => 'El nombre del producto debe tener como mínimo 2 caracteres.',
            'name.max' => 'El nombre del producto debe tener como máximo 115 caracteres.',
            'description.min' => 'La descripcion del producto debe tener como mínimo 2 caracteres.',
            'description.max' => 'La descripcion  del producto debe tener como máximo 115 caracteres.',
            'description.required' => 'La descripcion  del producto es obligatorio.',
        ];

        $validar = Validator::make($tmp,$parameters,$messages);  
        if($validar->fails() ){
            return response()->json(array(
                'status' => 'fail',
                'e_name'=> $validar->errors()->first('name') ,
                'e_decription'=> $validar->errors()->first('description')
            ),200);
        }else{
    
                   
            if (!$request->file('image') == null) {
                
                $file = $request->file('image');
                $file_extension = $file->getClientOriginalExtension();
                $aux_file = new TokenController();
                $file_name      = $aux_file->randomString(15);
                $name_file= $file_name.'.'.$file_extension;
                $request->file('image')->move('products/', $name_file);
                $tmp_image='products/'.$name_file;
            }
            $status=0;
            
            $data = DB::select("call Add_Product(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($request->name, $description, $request->type_product,
            $request->platform, $request->gender, $request->price, $tmp_image, $request->release_date, $status,
            $request->stock, $token->randomString(15)));
            
                $products=Product::all();
            return view('products.product', ['products' => $products]); 
                   
                 
        }
    }

    public function examinateProduct($token){
        $product = Product::where('token_product', $token)->first(); 

        return view('products.examinateproduct', [
            'products' => $product
            ]);

    }

    public function changeStatus($token){
        $product_bd = Product::where('token_product', $token)->first();
        $status=0;
        if($product_bd->status==1 || $product_bd->status=='1'){
            $status=0;
        }else{
            $status=1;
        }
        $product = Product::where('token_product', $token)->update(['status' => $status]); 
        $products= DB::select('call Consult_Product()');
         return view('products.product', ['products' => $products]);   

    }

    public function updateProduct(Request $request){
       
        $producto_bd = Product::where('token_product', $request->token)->first();  
       
        $parameters=[];
        $tmp=[];
      
        if($request->name != $producto_bd->name){
            $parameters['name'] = 'required|min:2|max:50';
            $tmp['name'] = $request->name;
          
        }

        
        $description= $request->description;
        if($description != $producto_bd->description){
            $parameters['description'] = 'required|min:2|max:400';
            $tmp['description'] = $description;
        }

        $messages = [
            'name.min' => 'El nombre del producto debe tener como mínimo 2 caracteres.',
            'name.max' => 'El nombre del producto debe tener como máximo 115 caracteres.',
            'name.required' => 'El nombre del producto es obligatorio.',
            'description.min' => 'La descripcion del producto debe tener como mínimo 2 caracteres.',
            'description.max' => 'La descripcion  del producto debe tener como máximo 115 caracteres.',
            'description.required' => 'La descripcion  del producto es obligatorio.',
           
        ];

        $validar = Validator::make($tmp,$parameters,$messages); 

        if(!$request->type_product == $producto_bd->type_product){
            $tmp['type_product'] = $request->type_product;
        }else{
            $request->type_product = $producto_bd->type_product;
        }

        if(!$request->plataform == $producto_bd->plataform){
            $tmp['plataform'] = $request->plataform;
        }else{
            $request->plataform = $producto_bd->plataform;
        }

        if(!$request->gender == $producto_bd->gender){
            $tmp['gender'] = $request->gender;
        }else{
            $request->gender = $producto_bd->gender;
        }

        $status = $producto_bd->status;
    
        if(!$request->release_date == $producto_bd->release_date){
            $tmp['release_date'] = $request->release_date;
        }else{
            $request->release_date = $producto_bd->release_date;
        }

        if(!$request->price == $producto_bd->price){
            $tmp['price'] = $request->price;
        }else{
            $request->price = $producto_bd->price;
        }

        if (!$request->file('image') == null) {
                        
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();
            $aux_file = new TokenController();
            $file_name      = $aux_file->randomString(15);
            $name_file= $file_name.'.'.$file_extension;
            $request->file('image')->move('products/', $name_file);
            $tmp_image='products/'.$name_file;
        }else{
            $tmp_image=$producto_bd->image;
        }
        
        if($validar->fails() ){
            /*return response()->json(array(
                'status' => 'fail',
                'e_email'=> $validar->errors()->first('email') ,
                'e_decription'=> $validar->errors()->first('description')
            ),200);*/

            return redirect () -> back () -> withInput () -> withErrors (['status' => 'fail',
            'e_name'=> $validar->errors()->first('name') ,
            'e_decription'=> $validar->errors()->first('description')]);

        }else{    
            
                     
            //$data = DB::select("call Modify_Product(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($request->token, $request->name, $description, $request->type_product,
               // $request->plataform, $request->gender, $request->price, $tmp_image, $request->release_date, $status,
                //$request->stock));
                
                Product::where('token_product', $request->token)
                ->update(['name'=>$request->updateName, 'description' =>$description, 'type_product'=>$request->type_product, 'image' =>$tmp_image,
                'plataform' => $request->plataform, 'gender'=> $request->gender, 'price' =>  $request->price, 'realease_date' =>$request->release_date,
                'stock', $request->stock, 'status' => $status]);
  
                $product = Product::where('token_product', $token)->first(); 

                return view('products.examinateproduct', [
                    'products' => $product
                    ]);
            
            
        }

    }
}

