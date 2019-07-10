<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;

class ButunYarismalarController extends Controller
{
    public function index(){
        $urunler = Urun::all();

        return view ('menüelements/butunyarismalar',compact('urunler'));
    }
    public function artan(){
        $urunler = Urun::orderByDesc('olusturulma_tarihi')->get();

        return view ('menüelements/butunyarismalar',compact('urunler'));
    }
}
