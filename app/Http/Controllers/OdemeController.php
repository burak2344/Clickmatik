<?php

namespace App\Http\Controllers;

use App\Kullanici;
use App\Mail\KullaniciTikAktarmaMail;
use App\Models\KullaniciDetay;
use App\Models\Siparis;
use App\Models\YarismaDenetim;
use Illuminate\Http\Request;
use Cart;
use Auth;
use Illuminate\Support\Facades\Mail;

class OdemeController extends Controller
{




    public function index(){

        if(!auth()->check())
        {
            return redirect()->route('kullanici.oturumac')
                ->with('mesaj_tur','info')
                ->with('mesaj','Ödeme işlemi için kullanıcı girişi veya kayıt olmanız gerekmektedir');
        }
        else if(count(Cart::content())==0)
        {
            return redirect()->route('anasayfa')
                ->with('mesaj_tur','info')
                ->with('mesaj','Ödeme işlemi için sepetiniz de ürün bulunmalıdır!');
        }

        $kullanici_detay = auth()->user()->detay;
        return view('odeme',compact('kullanici_detay'));


    }

    public function odemeyap()
    {
        $gelenid=Auth::user()->id;

        $siparis=request()->all();
        $siparis['sepet_id']=session('aktif_sepet_id');
        $siparis['siparis_tutari']=Cart::subtotal();
        $toplam = $siparis['toplamtik'];

        $detayagiden=['kullanici_id'=>$gelenid,'kullanici_bakiye'=>$toplam];



        $kullanici=Kullanici::where('id',$gelenid)->first();
        Mail::to(Auth::user()->email)->send(new KullaniciTikAktarmaMail($kullanici));

        Siparis::create($siparis);
        KullaniciDetay::create($detayagiden);

        $topeklenen = KullaniciDetay::where('kullanici_id',$gelenid)->sum('kullanici_bakiye');
        $topçıkan = YarismaDenetim::where('kullanici_id',$gelenid)->sum('tıklanan_miktar');
        $genelbakiye=$topeklenen-$topçıkan;
       $kullanici->update(['genel_bakiye' => $genelbakiye]);



        Cart::destroy();
        session()->forget('aktif_sepet_id');
        return redirect()->route('siparisler')
            ->with('mesaj_tur','success')
            ->with('mesaj','Sipariş işlemi başarılı bir şekilde gerçekleştirildi.');
    }



}
