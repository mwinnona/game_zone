<?php

namespace App\Http\Controllers;
use App\Order;
use App\Product;
use App\Product_Order;
use App\Sale;
use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function rankingProducts(){
        $pdf = app('dompdf.wrapper');
        //para cargar html
        //$pdf->loadHTML('<h1>Prueba</h1>');
        //$products= DB::select('call Consult_Product()');
        $products = Product::all();
        //vista
        $pdf->loadView('Pdf.rankingproducts', ['products' => $products]);
        //Para descargar
        //$pdf->stream();
        return $pdf->download('ranking_productos.pdf');
        //para visualizar
        //return $pdf->stream();
    }

    public function pdfBillOrder($token){
        $order = Order::where('token_order', $token)->first();
        $user = User::where('id', $order->id_user)->first();
        $order_Products = Product_Order::where('id_order', $order->id)->get();
        $products = array();
        for($i=0;$i<count($order_Products);$i++){
            $products[$i] = Product::where('token_product', $order_Products[$i]->token_order_product)->first();
        }
        $pdf =  \PDF::loadView('pdf.pdfBill', ['user' => $user, 'order' => $order, 'order_Products' => $order_Products, 'products' => $products]);
        return $pdf->download('order_000'.$order->id.'.pdf');
    }

    public function pdfRanking(Request $request){
        //dd($request->fechaInicial, $request->fechaFinal, $request->platform);
        $tokens = $request->token_product;
        $price = $request->price;
        $quantity = $request->quantity;
        $products = array();
        for($i=0;$i<count($tokens);$i++){
            $product = Product::where('token_product', $tokens[$i])->first();
            $product->stock = $quantity[$i];
            $product->price = $price[$i];
            $products[$i] = $product;
        }
        if($request->fechaInicial!=null && $request->fechaFinal!=null && $request->platform!=null){
            $pdf = \PDF::loadView('pdf.pdfRanking', ['products' => $products, 'fechaInicial' => $request->fechaInicial, 'fechaFinal' => $request->fechaFinal, 'platform' => $request->platform]);
            return $pdf->download('RankingDeVentas '.$request->fechaInicial.' a '.$request->fechaFinal.'.pdf');
        }else{
            $pdf = \PDF::loadView('pdf.pdfRanking', ['products' => $products]);
            return $pdf->download('RankingDeVentas.pdf');
        }
    }
}
