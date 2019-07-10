<?php

namespace App\Http\Controllers;

use App\Kullanici;
use Illuminate\Http\Request;
use Auth;

class BakiyeController extends Controller
{


    public function index(){
        if(!auth()->check())
        {
            return redirect()->route('kullanici.oturumac')
                ->with('mesaj_tur','info')
                ->with('mesaj','Bakiye Bilgisi kullanıcı girişi veya kayıt olmanız gerekmektedir');
        }


        $bakiyebilgisicek = Kullanici::where('id',Auth::user()->id)->firstOrFail();
        $bakiye=$bakiyebilgisicek->genel_bakiye;

        return view('bakiye',compact('bakiye'));
    }
}
