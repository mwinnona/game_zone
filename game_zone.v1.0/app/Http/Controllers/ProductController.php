<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use App\Product;
use App\Cart_Product;
use App\Order;
use App\Product_Order;
//use App\Http\Controllers\Auth;
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

    public function showAjax(Request $request){
        
        if(isset($request->cat_1) && $request->cat_1==1 ){
            $plataforma1=1;
        }else{
            $plataforma1=null;
        }
        
        if(isset($request->cat_2) && $request->cat_2==1){
            $plataforma2=2;
        }else{
            $plataforma2=null;
        }
  
        if(isset($request->cat_3) && $request->cat_3==1){
            $plataforma3=3;
        }else{
            $plataforma3=null;
        }

        if(isset($request->type_1) && $request->type_1==1){
            $type1=0;
        }else{
            $type1=null;
        }

        if(isset($request->type_2) && $request->type_2==1){
            $type2=1;
        }else{
            $type2=null;
        }

        if(isset($request->gen_1) && $request->gen_1==1){
            $gen1=1;
        }else{
            $gen1=null;
        }

        if(isset($request->gen_2) && $request->gen_2==1){
            $gen2=2;
        }else{
            $gen2=null;
        }

        if(isset($request->gen_3)  && $request->gen_3==1){
            $gen3=3;
        }else{
            $gen3=null;
        }

        if(isset($request->gen_4) &&$request->gen_4==1 ){
            $gen4=4;
        }else{
            $gen4=null;
        }

        if(isset($request->gen_5)  && $request->gen_5==1 ){
            $gen5=5;
        }else{
            $gen5=null;
        }

        if(isset($request->gen_6) && $request->gen_6==1){
            $gen6=6;
        }else{
            $gen6=null;
        }

        if(isset($request->gen_7) && $request->gen_7==1){
            $gen7=7;
        }else{
            $gen7=null; 
        }

        if(isset($request->gen_8)  && $request->gen_8==1 ){
            $gen8=8;
        }else{
            $gen8=null;
        }

        if(isset($request->gen_9) && $request->gen_9==1){
            $gen9=9;
        }else{
            $gen9=null;
        }

        if(isset($request->price_1) && $request->price_1==1){
            $p1=0; $p01=9.99;
        }else{
            $p1=null; $p01=null;
        }

        if(isset($request->price_2) && $request->price_2==1){
            $p2=9.99; $p02=19.99;
        }else{
            $p2=null; $p02=null;
        }

        if(isset($request->price_3) && $request->price_3==1){
            $p3=19.99; $p03=59.99;
        }else{
            $p3=null; $p03=null;
        }

        if(isset($request->price_4) && $request->price_4==1){
            $p4=59.99; $p04=99.99;
        }else{
            $p4=null; $p04=null;
        }
   
        $product =Product::where('plataform', $plataforma1)
        ->orWhere('plataform', $plataforma2)   
        ->orWhere('plataform', $plataforma3)
        ->where('type_product', $type1 )  
        ->orWhere('type_product', $type2) 
        ->where('gender', $gen1 )  
        ->orWhere('gender', $gen2 )
        ->orWhere('gender', $gen3 )  
        ->orWhere('gender', $gen4 )
        ->orWhere('gender', $gen5 )
        ->orWhere('gender', $gen6 )
        ->orWhere('gender', $gen7 )
        ->orWhere('gender', $gen8 )
        ->orWhere('gender', $gen9 )
        ->whereBetween('price', [$p1, $p01])
        ->orWhereBetween('price', [$p2, $p02])
        ->orWhereBetween('price', [$p3, $p03])
        ->orWhereBetween('price', [$p4, $p04])
        ->get();
       
        //return view('products.searchproduct', ['products' => $product]);       
        return view('products.product', ['products' => $product]);       
    }
    public function juegosxPlataforma($plataforma){
        
        if($plataforma==0 || $plataforma=='0'){
            $products=Product::where('plataform', 0)->get();  
        }else if($plataforma==1 || $plataforma=='1'){
            $products=Product::where('plataform', 1)->get(); 
            
        }else if($plataforma==2 || $plataforma=='2'){
            $products=Product::where('plataform', 2)->get();  
        }else{
            $products=Product::all();         
        }
       
        return view('products.product', ['products' => $products]); 
    }

    public function juegosxNombre(Request $request){
        $products=Product::where('name', 'LIKE', "%$request->gameName%")->get();
        
        return view('products.product', ['products' => $products]);
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
                ->update(['name'=>$request->name, 'description' =>$description, 'type_product'=>$request->type_product, 'image' =>$tmp_image,
                'plataform' => $request->plataform, 'gender'=> $request->gender, 'price' =>  $request->price, 'release_date' =>$request->release_date,
                'stock' => $request->stock, 'status' => $status]);
  
                $product = Product::where('token_product', $request->token)->first(); 

                return view('products.examinateproduct', [
                    'products' => $product
                    ]);
            
            
        }

    }
}

