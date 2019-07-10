<?php

namespace App\Http\Controllers;

use App\Models\Siparis;
use Illuminate\Http\Request;

class SiparisController extends Controller
{
    public function index(){
        $siparisler = Siparis::with('sepet')
            ->whereHas('sepet',function ($query){
                $query->where('kullanici_id',auth()->id());
            })
            ->orderBydesc('olusturulma_tarihi')
            ->get();

        return view('siparisler',compact('siparisler'));
    }
}
