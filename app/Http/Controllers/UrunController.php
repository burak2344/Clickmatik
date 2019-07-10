<?php

namespace App\Http\Controllers;

use App\Kullanici;
use App\Models\KullaniciDetay;
use App\Models\Urun;
use App\Models\YarismaDenetim;
use Illuminate\Http\Request;
use Auth;

class UrunController extends Controller
{
    public function index($slug_urunadi){
        if(!auth()->check())
        {
            return redirect()->route('kullanici.oturumac')
                ->with('mesaj_tur','info')
                ->with('mesaj','Yarışmaya Katılabilmek için kullanıcı girişi veya kayıt olmanız gerekmektedir');
        }
        $urun = Urun::where('slug', $slug_urunadi )->firstorfail();
        $zaman = now();
        $bakiyebilgisicek = Kullanici::where('id',Auth::user()->id)->firstOrFail();
        $bakiye=$bakiyebilgisicek->genel_bakiye;
        return view('urun',compact('urun','zaman','bakiye'));
    }
    public function tikdenetim()
    {

        $gelenid = Auth::user()->id;
        $tıksayisi = request()->all();
        $toplam = $tıksayisi['sonuc'];
        $gelenyarismaid = $tıksayisi['id'];


        $tabloyagiden = ['yarisma_id' => $gelenyarismaid, 'kullanici_id' => $gelenid, 'tıklanan_miktar' => $toplam];
        YarismaDenetim::create($tabloyagiden);

        $topeklenen = KullaniciDetay::where('kullanici_id',$gelenid)->sum('kullanici_bakiye');
        $topçıkan = YarismaDenetim::where('kullanici_id',$gelenid)->sum('tıklanan_miktar');
        $genelbakiye=$topeklenen-$topçıkan;


        if($genelbakiye>=0) {
            $entry = Kullanici::where('id', $gelenid)->firstOrFail();
            $entry->update(['genel_bakiye' => $genelbakiye]);
        }

        if($genelbakiye<0) {
            $entry = Kullanici::where('id', $gelenid)->firstOrFail();
            $entry->update(['genel_bakiye' => 0]);
        }





        return redirect()->route('anasayfa')
            ->with('mesaj_tur','success')
            ->with('mesaj','Yarışma Sonucunuz Gönderildi.Kazananlar Listesinde Bir Kaç Dakika İçerisinde Açıklanacaktır.');
    }
}
