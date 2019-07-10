<?php

namespace App\Http\Controllers;

use App\Models\Kampanya;
use App\Models\Sepet;
use Illuminate\Http\Request;
use App\Models\SepetKampanya;
use Cart;
use Validator;

class SepetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        return view('sepet');
    }

    public function ekle(){
        $kampanya=Kampanya::find(request('id'));


        $cartItem=Cart::add($kampanya->id,$kampanya->kampanya_adi,1,$kampanya->kampanya_fiyati);

        if(auth()->check()){

            $aktif_sepet_id = session('aktif_sepet_id');

            if(!isset($aktif_sepet_id)){

                $aktif_sepet = Sepet::create([

                    'kullanici_id'=> auth()->id()
                ]);

                $aktif_sepet_id = $aktif_sepet->id;

                session()->put('aktif_sepet_id', $aktif_sepet_id);
            }

            SepetKampanya::updateOrCreate(
                ['sepet_id' => $aktif_sepet_id , 'kampanya_id' =>$kampanya->id],
                [ 'adet'=> $cartItem->qty,'fiyati'=> $kampanya->kampanya_fiyati, 'durum'=> 'Beklemede']
            );
        }


        return redirect()->route('sepet')
            ->with('mesaj_tur','success')
            ->with('mesaj','Ürün Sepete Eklendi');
    }

    public function kaldir($rowid){
        if(auth()->check()){
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem=Cart::get($rowid);
            SepetKampanya::where('sepet_id',$aktif_sepet_id)->where('kampanya_id',$cartItem->id)->delete();

        }

        Cart::remove($rowid);
        return redirect()->route('sepet')
            ->with('mesaj_tur','success')
            ->with('mesaj','Ürün Sepetten Kaldırıldı.');
    }




    public function bosalt(){

        if(auth()->check()){
            $aktif_sepet_id = session('aktif_sepet_id');
            SepetKampanya::where('sepet_id',$aktif_sepet_id)->delete();

        }

        Cart::destroy();
        return redirect()->route('sepet')
            ->with('mesaj_tur','success')
            ->with('mesaj','Sepetiniz Boşaltıldı.');
    }

    public function guncelle($rowid){
        $validator = Validator::make(request()->all(),['adet'
        =>'required|numeric|between:0,5']);

        if($validator->fails()){
            session()->flash('mesaj_tur','danger');
            session()->flash('mesaj','Adet değeri 1 ile 5 arasında olmalıdır.');
            return response()->json(['success'=>false]);
        }

        if(auth()->check()){
            $aktif_sepet_id = session('aktif_sepet_id');
            $cartItem=Cart::get($rowid);

            if(request('adet')==0)
                SepetKampanya::where('sepet_id',$aktif_sepet_id)->where('kampanya_id',$cartItem->id)->delete();
            else
                SepetKampanya::where('sepet_id',$aktif_sepet_id)->where('kampanya_id',$cartItem->id)
                    ->update(['adet'=> request('adet')]);
 }




        Cart::update($rowid,request('adet'));

        session()->flash('mesaj_tur','success');
        session()->flash('mesaj','Adet Bilgisi Güncellendi');

        return response()->json(['success'=>true]);

    }
}
