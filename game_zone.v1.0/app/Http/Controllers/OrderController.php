<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ProductController;
use App\Mail\MessageOrder;
use App\Product;
use App\Cart_Product;
use App\Order;
use App\Product_Order;
use Validator;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showCart(){
        if(isset(\Auth::user()->id)){
            $id_user = \Auth::user()->id;
            $cart_products = Cart_Product::where('id_user', $id_user)->get();
            $products = Product::all();
            return view('products.cart', ['cart_products'=>$cart_products, 'products'=>$products]);
        }else{
            //return redirect()->route('login')->with('alert', 'Escoje un juego para generar un pedido');
            return redirect('login')->with('status', 'Para agregar juegos al carrito, primero necesita iniciar sesión');
        }
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
            $products = array();
            $total_amount = 0;
            for($k=0;$k<count($arrayCart);$k++){
                $arrayProducts = Product::all();
                for($f=0;$f<count($arrayProducts);$f++){
                    if($arrayCart[$k]->id_product==$arrayProducts[$f]->id){
                        //$subTotal = $arrayProducts[$f]->price*;
                        $arrayProducts[$f]->stock = $arrayCart[$k]->quantity;
                        $subTotal = $arrayProducts[$f]->stock*$arrayProducts[$f]->price;
                        $total_amount = $total_amount + $subTotal;
                        $arrayProducts[$f]->price = $subTotal;
                        $products[$k] = $arrayProducts[$f];
                        break;
                    }
                }
            }
            return view('products.order', ['products' => $products, 'total_amount'=> $total_amount]);
        }else{
            return redirect()->back()->with('alert', 'Escoje un juego para generar un pedido');
        }
    }
    

    public function order(Request $request){
        //Order
        /*if($request->cardNumber==null){
            return redirect('carrito')->with('alert', 'Debes ingresar un método de pago para realizar el pedido.');
        }*/
        $id_user = \Auth::user()->id;
        $token = new TokenController();
        $token_order = $token->randomString(15);
        $date = date('Y-m-d');
        $new_Order = new Order();
        $new_Order->id_user = $id_user;
        $new_Order->token_order = $token_order;
        $new_Order->total_amount = $request->priceOrder;
        $new_Order->date_realization = $date;
        $new_Order->save();
        //Porducts-Order
        $order = Order::where('token_order', $token_order)->first();
        $tokenProducts = $request->token;
        $products = Product::all();
        $quantitys = $request->quantity;
        $subTotals = $request->subTotal;
        for($i=0;$i<count($tokenProducts);$i++){
            for($j=0;$j<count($products);$j++){
                if($products[$j]->token_product==$tokenProducts[$i]){
                    $productOrder = new Product_Order();
                    $productOrder->quantity = $quantitys[$i];
                    $productOrder->subtotal = $subTotals[$i];
                    $productOrder->id_order = $order->id;
                    $productOrder->token_order_product = $products[$j]->token_product;
                    $productOrder->save();
                    break;
                }
            }
        }
        $products_Order = Product_Order::where('id_order', $order->id)->get();

        //API de correos de Laravel para correo de pedido realizado:
        Mail::to(\Auth::user()->email)->send(new MessageOrder($order, $products_Order, $products, \Auth::user()->name));
        return redirect('pedidos');
    }

    public function showOrders(){
        $id_user = \Auth::user()->id;
        $orders = Order::where('id_user', $id_user)->get();
        $products = Product::all();
        $orderProducts = array();
        $iterator = 0;
        for($i=0;$i<count($orders);$i++){
            $productsAux = Product_Order::where('id_order', $orders[$i]->id)->get();
            for($j=0;$j<count($productsAux);$j++){
                //$orderProducts.push($productsAux[$j]);
                $orderProducts[$iterator]=$productsAux[$j];
                $iterator++;
            }
            //array_push($orderProducts, $productsAux);
        }
        //dd($orderProducts[0]->token_order_product);
        return view('products.orders', ['orderProducts' => $orderProducts, 'orders'=> $orders, 'products'=>$products])->with('alert', 'El Pedido se ah realizado de manera exitosa.');;
    }
}
