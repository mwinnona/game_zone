<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TokenController;
use App\Order;
use App\Product;
use App\Product_Order;
use App\Sale;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReportsController extends Controller
{
    function showOrders(){
        $orders = Order::all()->sortByDesc('created_at');
        //$date = (explode(" ", $orders[0]->created_at));
        //$fecha = $date[0];
        //$hora = $date[1];
        $users =  User::all();
        return view('reports.orderReports', ['orders' => $orders, 'users' => $users]);
    }

    function bestSales(){
        $products = Product::all();
        $products_ranking = array();
        for($i=0;$i<count($products);$i++){
            $sales = Sale::where('token_product', $products[$i]->token_product)->get();
            if(count($sales)!=0){
                $quantity = 0;
                for($j=0;$j<count($sales);$j++){
                    $quantity = $quantity + $sales[$j]->quantity;
                }
                $products[$i]->stock = $quantity;
                $monto = $quantity*$products[$i]->price;
                $products[$i]->price = $monto;
                $products_ranking[$i] = $products[$i];
            }
        }

        for($i=0;$i<count($products_ranking);$i++){
            for($k=$i+1;$k<count($products_ranking);$k++){
                if($products_ranking[$k]->stock>$products_ranking[$i]->stock){
                    $temp = $products_ranking[$k];
                    $products_ranking[$k] = $products_ranking[$i];
                    $products_ranking[$i] = $temp;
                }
            }
        }
        return view('reports.ranking', ['products' => $products_ranking]);
    }

    function filter(Request $request){
        if($request->platform!=0){
            $products = Product::where('plataform', $request->platform)->get();
            $products_ranking = array();
            $iterator = 0;
            if($request->month!=0){
                if($request->month=='01' || $request->month=='03' || $request->month=='05' || $request->month=='07' || 
                $request->month=='08' || $request->month=='10' || $request->month=='12'){
                    $fechaInicial = $request->year.'-'.$request->month.'-01';
                    $fechaFinal = $request->year.'-'.$request->month.'-31';
                }else if($request->month=='02'){
                    $fechaInicial = $request->year.'-'.$request->month.'-01';
                    $fechaFinal = $request->year.'-'.$request->month.'-29';
                }else{
                    $fechaInicial = $request->year.'-'.$request->month.'-01';
                    $fechaFinal = $request->year.'-'.$request->month.'-30';
                }
            }else{
                $fechaInicial = $request->year.'-01-01';
                $fechaFinal = $request->year.'-12-31';
            }

            for($i=0;$i<count($products);$i++){
                $sales = Sale::where('token_product', $products[$i]->token_product)->whereBetween('date', [$fechaInicial, $fechaFinal])->get();
                if(count($sales)!=0){
                    $quantity = 0;
                    for($j=0;$j<count($sales);$j++){
                        $quantity = $quantity + $sales[$j]->quantity;
                    }
                    $products[$i]->stock = $quantity;
                    $monto = $quantity*$products[$i]->price;
                    $products[$i]->price = $monto;
                    $products_ranking[$iterator] = $products[$i];
                    $iterator++;
                }
            }

            for($i=0;$i<count($products_ranking);$i++){
                for($k=$i+1;$k<count($products_ranking);$k++){
                    if($products_ranking[$k]->stock>$products_ranking[$i]->stock){
                        $temp = $products_ranking[$k];
                        $products_ranking[$k] = $products_ranking[$i];
                        $products_ranking[$i] = $temp;
                    }
                }
            }
            return view('reports.ranking', ['products' => $products_ranking, 'platform'=> $request->platform, 'fechaInicial' => $fechaInicial, 'fechaFinal' => $fechaFinal]);
        }else{
            $products = Product::all();
            $products_ranking = array();
            $iterator = 0;
            if($request->month!=0){
                if($request->month=='01' || $request->month=='03' || $request->month=='05' || $request->month=='07' || 
                $request->month=='08' || $request->month=='10' || $request->month=='12'){
                    $fechaInicial = $request->year.'-'.$request->month.'-01';
                    $fechaFinal = $request->year.'-'.$request->month.'-31';
                }else if($request->month=='02'){
                    $fechaInicial = $request->year.'-'.$request->month.'-01';
                    $fechaFinal = $request->year.'-'.$request->month.'-29';
                }else{
                    $fechaInicial = $request->year.'-'.$request->month.'-01';
                    $fechaFinal = $request->year.'-'.$request->month.'-30';
                }
            }else{
                $fechaInicial = $request->year.'-01-01';
                $fechaFinal = $request->year.'-12-31';
            }

            for($i=0;$i<count($products);$i++){
                $sales = Sale::where('token_product', $products[$i]->token_product)->whereBetween('date', [$fechaInicial, $fechaFinal])->get();
                if(count($sales)!=0){
                    $quantity = 0;
                    for($j=0;$j<count($sales);$j++){
                        $quantity = $quantity + $sales[$j]->quantity;
                    }
                    $products[$i]->stock = $quantity;
                    $monto = $quantity*$products[$i]->price;
                    $products[$i]->price = $monto;
                    $products_ranking[$iterator] = $products[$i];
                    $iterator++;
                }
            }

            for($i=0;$i<count($products_ranking);$i++){
                for($k=$i+1;$k<count($products_ranking);$k++){
                    if($products_ranking[$k]->stock>$products_ranking[$i]->stock){
                        $temp = $products_ranking[$k];
                        $products_ranking[$k] = $products_ranking[$i];
                        $products_ranking[$i] = $temp;
                    }
                }
            }
            return view('reports.ranking', ['products' => $products_ranking, 'platform'=> $request->platform, 'fechaInicial' => $fechaInicial, 'fechaFinal' => $fechaFinal]);
        }
    }

    function billOrder($token){
        //$user = User::where('id', \Auth::user()->id)->first();
        $order = Order::where('token_order', $token)->first();
        $user = User::where('id', $order->id_user)->first();
        $order_Products = Product_Order::where('id_order', $order->id)->get();
        $products = array();
        for($i=0;$i<count($order_Products);$i++){
            $products[$i] = Product::where('token_product', $order_Products[$i]->token_order_product)->first();
        }
        //return view('reports.billOrder', ['user' => $user, 'order' => $order, 'order_Products' => $order_Products, 'products' => $products]);
        return view('reports.billView', ['user' => $user, 'order' => $order, 'order_Products' => $order_Products, 'products' => $products]);
    }
}
