<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ProductController;
use App\Mail\MessageOrder;
use App\Mail\MessageClaim;
use App\Product;
use App\Cart_Product;
use App\Order;
use App\Product_Order;
use App\Sale;
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
        $iterator = 0;
        $productsQ = array();
        if($chosse!=null){
            for($r=0;$r<count($chosse);$r++){
                $productCartAux = Cart_Product::where('id', $chosse[$r])->first();
                $productAux = Product::where('id', $productCartAux->id_product)->first();
                if($productAux->stock < $productCartAux->quantity){
                    $iterator++;
                    $productsQ[$iterator-1] = $productAux;
                }
            }

            if($iterator!=0){
                $alert ='Has superado las unidades existentes de los siguientes productos:'.'\n';
                for($y=0;$y<count($productsQ);$y++){
                    if($y==count($productsQ)-1){
                        $alert = $alert.'- Nombre: '.$productsQ[$y]->name.' ---  Máximo: '.$productsQ[$y]->stock.' unidades';
                    }else{
                        $alert = $alert.'- Nombre: '.$productsQ[$y]->name.' ---  Máximo: '.$productsQ[$y]->stock.' unidades'.'\n';
                    }
                }
                return redirect()->back()->with('alert', $alert);
            }else{
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
            }

        }else{
            return redirect()->back()->with('alert', 'Escoje un juego para generar un pedido');
        }
    }
    

    public function order(Request $request){
        //Order
        /*if($request->cardNumber==null){
            return redirect('carrito')->with('alert', 'Debes ingresar un método de pago para realizar el pedido.');
        }*/
        for($k=0;$k<count($request->token);$k++){
            $productAux = Product::where('token_product', $request->token[$k])->first();
            //dd($productAux);
            if($productAux->stock < $request->quantity[$k]){
                //dd("Break");
                return redirect('cart')->with('status', 'Para agregar juegos al carrito, primero necesita iniciar sesión');
                break;
            }
        }
        $id_user = \Auth::user()->id;
        $token = new TokenController();
        $token_order = $token->randomString(15);
        date_default_timezone_set('America/Lima');
        $date = date('Y-m-d');
        //$date = DateTime('Y-m-d H:i:s');
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
                    $newStock = $products[$j]->stock - $quantitys[$i];
                    Product::where('token_product', $products[$j]->token_product)->update(['stock' => $newStock]);
                    //Aquí se adiciona a la tabla
                    $sale = new Sale();
                    $sale->id_user = \Auth::user()->id;
                    $sale->token_product = $products[$j]->token_product;
                    $sale->quantity = $quantitys[$i];
                    $token_sale = new TokenController();
                    $sale->token_sale = $token_sale->randomString(15);
                    $date_sale = date('Y-m-d');
                    $sale->date = $date_sale;
                    $sale->save();
                    //
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
        if(isset(\Auth::user()->id)){
            $id_user = \Auth::user()->id;
            $orders = Order::where('id_user', $id_user)->get();
            $products = Product::all();
            $orderProducts = array();
            $iterator = 0;
            for($i=0;$i<count($orders);$i++){
                $productsAux = Product_Order::where('id_order', $orders[$i]->id)->get();
                for($j=0;$j<count($productsAux);$j++){
                    $orderProducts[$iterator]=$productsAux[$j];
                    $iterator++;
                }
            }
            return view('products.orders', ['orderProducts' => $orderProducts, 'orders'=> $orders, 'products'=>$products])->with('alert', 'El Pedido se ah realizado de manera exitosa.');
        }else{
            return redirect('login')->with('status', 'Para acceder a los pedidos, primero necesita iniciar sesión');
        }
    }

    public function viewOrder($token){
        $order = Order::where('token_order', $token)->first();
        $date = (explode(" ", $order->created_at));
        $fecha = $date[0];
        $hora = $date[1];
        $order_Products = Product_Order::where('id_order', $order->id)->get();
        $products = array();
        for($i=0;$i<count($order_Products);$i++){
            $products[$i] = Product::where('token_product', $order_Products[$i]->token_order_product)->first();
        }

        return view('products.viewOrder', ['order' => $order, 'order_Products' => $order_Products, 'products' => $products, 'fecha' => $fecha, 'hora' => $hora]);
    }

    public function updateStatus($token){
        Order::where('token_order', $token)->update(['status' => '3']);
        return self::viewOrder($token);
    }

    public function claim($token){
        $order = Order::where('token_order', $token)->first();
        return view('products.claim', ['order' => $order]);
    }

    public function claimMail(Request $request){
        //dd($request);
        $parameters=[];
        $tmp=[];
        
        $parameters['affair'] = 'required|min:15|max:50';
        $tmp['affair'] = $request->affair;
            
        $parameters['description'] = 'required|min:50|max:400';
        $tmp['description'] = $request->description;

        $messages = [
            'affair.required' => 'El asunto del reclamo es obligatorio.',
            'affair.min' => 'El asunto del reclamo debe tener como mínimo 15 caracteres.',
            'affair.max' => 'El asunto del reclamo debe tener como máximo 50 caracteres.',
            'description.min' => 'La descripcion del reclamo debe tener como mínimo 50 caracteres.',
            'description.max' => 'La descripcion  del reclamo debe tener como máximo 400 caracteres.',
            'description.required' => 'La descripcion del reclamo es obligatorio.',
        ];

        $validar = Validator::make($tmp,$parameters,$messages);

        if($validar->fails()){
            return redirect()->back()->withInput()->withErrors(['e_affair'=> $validar->errors()->first('affair'), 'e_decription'=> $validar->errors()->first('description')]);
        }else{
            $order = Order::where('token_order', $request->token_order)->first();
            $body = [];
            $body['affair'] = $request->affair;
            $body['description'] = $request->description;
            Mail::to('Zone13Game@gmail.com')->send(new MessageClaim($order, \Auth::user()->name, \Auth::user()->email, $body));
            return self::viewOrder($request->token_order);

        }
    }
}
