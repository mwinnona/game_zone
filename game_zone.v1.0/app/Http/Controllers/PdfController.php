<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function rankingProducts(){
        $pdf = app('dompdf.wrapper');
        //para cargar html
        //$pdf->loadHTML('<h1>Prueba</h1>');
        $products= DB::select('call Consult_Product()');
        //vista
        $pdf->loadView('Pdf.rankingproducts', ['products' => $products]);
        //Para descargar
        //$pdf->download('ranking_productos.pdf');
        //para visualizar
        return $pdf->stream();
    }
}
