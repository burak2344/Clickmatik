<?php

namespace App\Http\Controllers;

use App\Models\KullaniciDetay;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\UrunDetay;
use App\Models\Urun;
use App\Models\Kampanya;

class AnasayfaController extends Controller
{
    public function index(){
    $kategoriler = Kategori::all();
    //->take(3);

        $urunler_one_cikan=Urun::select('urun.*')
            ->join('urun_detay','urun_detay.urun_id','urun.id')
            ->where('urun_detay.goster_one_cikan',1)
            ->orderBy('baslangic_tarihi','desc')
            ->take(5000)->get();

       $kampanyalar=Kampanya::all();








    return view('anasayfa',compact('kategoriler','urunler_one_cikan','kampanyalar'));
}
}
