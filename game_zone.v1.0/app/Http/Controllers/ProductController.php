<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {   
              
        //$products=Product::all();
        $products='addad';
         return view('products.product', ['products' => $products]);
               
    }


    public function createProduct(Request $request){
        //crear producto No olvidar validar si es necesario.

    }
}
