<?php

namespace App\Http\Controllers;

use App\Kullanici;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Auth;

class KullaniciBilgisiController extends Controller
{
    public function index(){
        $gelecekid=Auth::user()->id;

        $list= Kullanici::where('id',$gelecekid)->paginate(1);

        return view('kullanicibilgileri.bilgilerim',compact('list'));
    }

    public function form($id=0)
    {
        $entry=new Kullanici;
        if($id > 0){
            $entry =Kullanici::find($id);
        }
        return view('kullanicibilgileri.form',compact('entry'));
    }

    public function kaydet($id= 0)
    {
        $this->validate(request(),[
            'adsoyad'=>'required',
            'email'=>'required|email',

        ]);
        $data=request()->only('adsoyad','email','adres');

        if($id >0 ){
            $entry=Kullanici::where('id',$id)->firstOrFail();
            $entry->update($data);
        }
        return redirect()->route('kullanicibilgileri.bilgilerim.duzenle',$entry->id)
            ->with('mesaj',($id> 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        Kullanici::destroy($id);
        return redirect()->route('kullanicibilgileri.bilgilerim')
            ->with('mesaj','Kayıt Silindi')->with('mesaj_tur','success');
    }
}
