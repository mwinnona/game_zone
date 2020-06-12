<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ProductController;
use App\Product;
use App\Cart_Product;
use App\Order;
use App\Product_Order;
use Validator;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showCart(){
        $id_user = \Auth::user()->id;
        $cart_products = Cart_Product::where('id_user', $id_user)->get();
        $products = Product::all();
        return view('products.cart', ['cart_products'=>$cart_products, 'products'=>$products]);
    }

    public function addCart($token){
        $id_user = \Auth::user()->id;
        $product = Product::where('token_product', $token)->first();
        $id_product = $product->id;
        $cart_product = Cart_Product::where('id_product', $id_product)->where('id_user', $id_user)->first();
        if(isset($cart_product)){
            $quantity = $cart_product->quantity + 1;
            Cart_Product::where('id_product', $id_product)->where('id_user', $id_user)->update(['quantity'=>$quantity]);
        }else{
            $token = new TokenController();
            $new_cart_product = new Cart_Product();
            $new_cart_product->id_product = $product->id;
            $new_cart_product->id_user = $id_user;
            $new_cart_product->quantity = 1;
            $new_cart_product->token_product_cart = $token->randomString(15);
            $new_cart_product->save();
        }

        //$products2= DB::select('call Consult_Product()');
        //return view('products.product', ['products' => $products2]);
        return self::showCart();
        //return back();
    }

    function updateQuantity(Request $request){
        $id = \Auth::user()->id;
        $quantitys = $request->quantity;
        $id_products = $request->id_product;
        for($i=0;$i<count($id_products);$i++){
            $cartProducts = Cart_Product::where('id_user', $id)->get();
            for($j=0;$j<count($cartProducts);$j++){
                if($cartProducts[$j]->id_product==$id_products[$i]){
                    $quantity = intval($quantitys[$i]);
                    Cart_Product::where('id_user', $id)->where('id_product', $cartProducts[$j]->id_product)->update(['quantity'=>$quantity]);
                }
            }
        }
    }

    public function preOrder(Request $request){
        $id_user = \Auth::user()->id;
        self::updateQuantity($request);
        $chosse = $request->escoger;
        if($chosse!=null){
            $arrayCart = array();
            for($i=0;$i<count($chosse);$i++){
                $cart_products = Cart_Product::where('id_user', $id_user)->get();
                 for($j=0;$j<count($cart_products);$j++){
                    if($cart_products[$j]->id==$chosse[$i]){
                        $arrayCart[$i] = $cart_products[$j];
                        break;
                    }
                } 
            }
            return view('products.order', ['cart_products' => $arrayCart]);
        }else{
            return redirect()->back()->with('alert', 'Escoje un juego para generar un pedido');
        }
    }
}
