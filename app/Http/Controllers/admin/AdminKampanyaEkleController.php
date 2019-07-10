<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kampanya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminKampanyaEkleController extends Controller
{
    public function index(){

        $list= Kampanya::paginate(500);

        return view('admin/kampanya/kampanyaekle',compact('list'));
    }

    public function form($id=0)
    {
        $entry=new Kampanya();
        if($id > 0){
            $entry =Kampanya::find($id);
        }
        return view('admin.kampanya.form',compact('entry'));
    }

    public function kaydet($id= 0)
    {
        $data=request()->only('kampanya_adi','kampanya_fiyati','kampanya_tikadedi');

        $this->validate(request(),[
            'kampanya_adi'=>'required',
            'kampanya_fiyati'=>'required',
            'kampanya_tikadedi'=>'required',



        ]);



        if($id >0 ){
            $entry=Kampanya::where('id',$id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry= Kampanya::create($data);
        }
        return redirect()->route('admin.kampanyaekle.duzenle',$entry->id)
            ->with('mesaj',($id> 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        Kampanya::destroy($id);
        return redirect()->route('admin.kampanyaekle')
            ->with('mesaj','Kayıt Silindi')->with('mesaj_tur','success');
    }
}
