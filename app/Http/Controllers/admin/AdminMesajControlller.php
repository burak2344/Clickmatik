<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kullanici;
use App\Mail\MesajMail;
use App\Models\Mesaj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminMesajControlller extends Controller
{
    public function index(){

        $list= Mesaj::paginate(5000);

        return view('admin/mesaj/mesajlar',compact('list'));
    }

    public function form($id=0)
    {

        if($id > 0){
            $entry =Mesaj::find($id);
        }
        return view('admin/mesaj/form',compact('entry'));
    }

    public function kaydet($id= 0)
    {

        $data1=request()->only('mesaj');




        if($id >0 ){
            $kaydet=Kullanici::where('adsoyad',request('adsoyad'))->first();
            $kaydet->update($data1);

        }

        $kullanici=Kullanici::where('adsoyad',request('adsoyad'))->first();
        Mail::to(request('email'))->send(new MesajMail($kullanici));
        return redirect()->route('admin.mesaj')
            ->with('mesaj','MAİL GÖNDERİLDİ')
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        Mesaj::destroy($id);
        return redirect()->route('admin.mesaj')
            ->with('mesaj','Kayıt Silindi')->with('mesaj_tur','success');
    }
}
