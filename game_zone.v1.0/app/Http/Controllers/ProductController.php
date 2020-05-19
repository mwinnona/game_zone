<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use App\Product;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {        
        $products=Product::all();
         return view('products.product', ['products' => $products]);       
    }

    public function createProduct(Request $request){
        //crear producto No olvidar validar si es necesario.
        $token= new TokenController();
        $parameters=[];
        $tmp=[];
        
        $parameters['name'] = 'required|min:2|max:115';
        $tmp['name'] = $request->name;
   
        if(!$request->description=null){
            $parameters['description'] = 'min:15|max:400';
            $tmp['description'] = $request->description;
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
                $producto = new Product;
                $producto->name = $request->name;
                $producto->description = $request->description;
                $producto->type_product = $request->type_product;
                $producto->plataform = $request->plataform;
                $producto->gender= $request->gender;
                $producto->price = $request->price;
                $producto->release_date = $request->release_date;
                $producto->status= $request->status;
                $producto->stock = $request->stock;
                $producto->token_product=$token->randomString(15);
                $producto->save();
                return response()->json(array(
                    'status' => 'ok',
                    ), 200);   
        }
    }

    public function examinateProduct($token){
        $products = Product::where('token_product', $token)->first(); 

        return view('products.examinateproduct', [
            'products' => $product
            ]);

    }

    public function updateProduct(Request $request){
        $producto_bd = Product::where('token_product', $request->token)->first();  
        $parameters=[];
        $tmp=[];
        $changes=0;
        if(!$request->name = $producto_bd->name){
            $parameters['name'] = 'required|min:2|max:50';
            $tmp['name'] = $request->name;
            $changes++;
        }

        if(!$request->description = $producto_bd->description){
            $parameters['description'] = 'required|min:15|max:200';
            $tmp['description'] = $request->description;
            $changes++;
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

        if(!$request->type_product = $producto_bd->type_product){
            $tmp['type_product'] = $request->type_product;
            $changes++;
        }

        if(!$request->plataform = $producto_bd->plataform){
            $tmp['plataform'] = $request->plataform;
            $changes++;
        }

        if(!$request->gender = $producto_bd->gender){
            $tmp['gender'] = $request->gender;
            $changes++;
        }

        if(!$request->status = $producto_bd->status){
            $tmp['status'] = $request->status;
            $changes++;
        }

        if(!$request->release_date = $producto_bd->release_date){
            $tmp['release_date'] = $request->release_date;
            $changes++;
        }

        if(!$request->price = $producto_bd->price){
            $tmp['price'] = $request->price;
            $changes++;
        }

        
        if($validar->fails() ){
            return response()->json(array(
                'status' => 'fail',
                'e_email'=> $validar->errors()->first('email') ,
                'e_decription'=> $validar->errors()->first('description')
            ),200);
        }else{
            if ($changes >0) {
                
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
}

