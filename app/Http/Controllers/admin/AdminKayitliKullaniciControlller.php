<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kullanici;
use Illuminate\Http\Request;

class AdminKayitliKullaniciControlller extends Controller
{


    public function index(){

        $list= Kullanici::orderBy('olusturulma_tarihi')->paginate(5000);

        return view('admin/kullanici/kayitlikullanicilar',compact('list'));
    }

    public function form($id=0)
    {
        $entry=new Kullanici;
        if($id > 0){
            $entry =Kullanici::find($id);
        }
        return view('admin/kullanici/form',compact('entry'));
    }

    public function kaydet($id= 0)
    {
        $this->validate(request(),[
            'adsoyad'=>'required',
            'email'=>'required|email',

        ]);
        $data=request()->only('adsoyad','email','adres');

        $data['aktif_mi'] = request()->has('aktif_mi') && request('aktif_mi') == 1 ? 1 : 0;
        $data['admin_mi'] = request()->has('admin_mi') && request('admin_mi') == 1 ? 1 : 0;

        if($id >0 ){
            $entry=Kullanici::where('id',$id)->firstOrFail();
            $entry->update($data);
        }else{
            $entry= Kullanici::create($data);

        }
        return redirect()->route('admin.kayitlikullanicilar.duzenle',$entry->id)
            ->with('mesaj',($id> 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        Kullanici::destroy($id);
        return redirect()->route('admin.kayitlikullanicilar')
            ->with('mesaj','Kayıt Silindi')->with('mesaj_tur','success');
    }


}
