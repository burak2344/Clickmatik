<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Urun;
use App\Models\UrunDetay;
use Illuminate\Http\Request;

class AdminYarismaEkleControlller extends Controller
{
    public function index()
    {
            $list = Urun::orderByDesc('id')->paginate(10000);

        return view('admin.yarışmalar.yarismaekle', compact('list'));
    }

    public function form($id=0)
{
    $entry=new Urun();
    $urun_kategorileri=[];
    if($id > 0){
        $entry =Urun::find($id);
        $urun_kategorileri=$entry->kategoriler()->pluck('kategori_id')->all();
    }
    $kategoriler=Kategori::all();
    return view('admin.yarışmalar.form',compact('entry','kategoriler','urun_kategorileri'));
}

    public function kaydet($id= 0)
    {
        $data=request()->only('urun_adi','slug','aciklama','baslangic_tarihi','bitis_tarihi');
        $data_detay = request()->only( 'goster_one_cikan');

        $kategoriler=request('kategoriler');

        if(!request()->filled('slug')) {
            $data['slug'] = str_slug(request('urun_adi'));
            request()->merge(['slug' => $data['slug']]);
        }


        $this->validate(request(),[
            'urun_adi'=>'required',
            'slug'=>(request('original_slug') != request('slug') ? 'unique:urun,slug' : ''),


        ]);



        if($id >0 ){
            $entry=Urun::where('id',$id)->firstOrFail();
            $entry->update($data);
            $entry->detay()->update($data_detay);
            $entry->kategoriler()->sync($kategoriler);
        } else {
            $entry= Urun::create($data);
            $entry->detay()->create($data_detay);
            $entry->kategoriler()->attach($kategoriler);
        }

        if(request()->hasFile('urun_resmi'))
        {
            $this->validate(request(),[
                'urun_resmi'=> 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);
            $urun_resmi=request()->file('urun_resmi');
            //$urun_resmi=request()->urun_resmi;

            $dosyaadi=$entry->id . "-" . time() . "." . $urun_resmi->extension();

            if($urun_resmi->isValid())
            {
                $urun_resmi->move('uploads/urunler',$dosyaadi);

                UrunDetay::updateOrCreate(
                    ['urun_id' => $entry->id],
                    ['urun_resmi'=>$dosyaadi]

                );

            }

        }



        return redirect()->route('admin.yarismaekle.duzenle',$entry->id)
            ->with('mesaj',($id> 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        $urun=Urun::find($id);
        $urun->kategoriler()->detach();
        $urun->detay()->delete();
        $urun->delete();
        Urun::destroy($id);
        return redirect()->route('admin.yarismaekle')
            ->with('mesaj','Kayıt Silindi')->with('mesaj_tur','success');
    }





}
