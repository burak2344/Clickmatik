<?php

namespace App\Http\Controllers;

use App\Kullanici;
use App\Models\Kazananlar;
use App\Models\Urun;
use App\Models\YarismaDenetim;
use Illuminate\Http\Request;

class KazananlarController extends Controller
{
    public function index(){
        $yarisma=YarismaDenetim::all();
        foreach ($yarisma as $kazanan)
        {
            $yarismaid=$kazanan->yarisma_id;
            $encoktıklanantık=YarismaDenetim::where('yarisma_id',$yarismaid)->max('tıklanan_miktar');
            $kazananid=YarismaDenetim::where('tıklanan_miktar',$encoktıklanantık)->first();
            $data=['yarisma_id'=>$yarismaid,'kazanan_id'=>$kazananid->kullanici_id,'tiklanansayi'=>$encoktıklanantık];
            Kazananlar::updateOrCreate($data);


        }

        $listele=Kazananlar::all();
        foreach ($listele as $liste)
        {
            $kullaniciid=$liste->kazanan_id;
            $yarisid=$liste->yarisma_id;
            $aaa=Kullanici::where('id',$kullaniciid)->firstOrFail();
            $bbb=Urun::where('id',$yarisid)->firstOrFail();
            $eee=Kazananlar::where('yarisma_id',$yarisid)->first();
            $ccc=$aaa->adsoyad;
            $ddd=$bbb->urun_adi;
            $data=['adsoyad'=>$ccc,'urun_adi'=>$ddd];
            $eee->update($data);

        }
        $sonlist=Kazananlar::all();




        return view ('menüelements/kazananlar',compact('sonlist'));
    }
}
