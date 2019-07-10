<?php

namespace App\Http\Controllers;

use App\Kullanici;
use App\Models\Mesaj;
use Auth;
use Illuminate\Http\Request;

class İletisimeGecController extends Controller
{
    public function index(){
        if(!auth()->check())
        {
            return redirect()->route('kullanici.oturumac')
                ->with('mesaj_tur','info')
                ->with('mesaj','Mesaj Gönderebilmek İçin Lütfen Giriş Yapınız');
        }
        $gelenid=Auth::user()->id;
        $kullanici=Kullanici::where('id',$gelenid)->first();
        return view ('menüelements.iletisimegec',compact('kullanici'));
    }

    public function kaydet()
    {


        $data=request()->only('adsoyad','email','mesaj');


        Mesaj::create($data);


        return redirect()->route('anasayfa')
            ->with('mesaj','Mesajınız Gönderildi. Cevab e-mailinize atılacaktır.')
            ->with('mesaj_tur','success');
    }

}
