<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;

class BitenYarismalarController extends Controller
{
    public function index(){
        $zaman=now();
        $now= strtotime($zaman);
        $urun = Urun::all();
        foreach ($urun as $bitenurun)
        {
            $bitis=$bitenurun->bitis_tarihi;
            $bittimi=strtotime($bitis);
            if($bittimi<$now){
                $aa[]=Urun::where('id',$bitenurun->id)->firstOrFail();



            }
        }


        return view ('menüelements/bitenyarismalar',compact('aa'));



    }
}
