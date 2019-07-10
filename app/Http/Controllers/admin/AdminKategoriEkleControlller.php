<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\KategoriDetay;
use Illuminate\Http\Request;

class AdminKategoriEkleControlller extends Controller
{
    public function index(){

        $list= Kategori::paginate(50);

        return view('admin/kategori/kategoriekle',compact('list'));
    }

    public function form($id=0)
    {
        $entry=new Kategori();

        if($id > 0){
            $entry =Kategori::find($id);

        }
        return view('admin.kategori.form',compact('entry'));
    }

    public function kaydet($id= 0)
    {
        $data=request()->only('kategori_adi','slug');
        if(!request()->filled('slug')) {
            $data['slug'] = str_slug(request('kategori_adi'));
            request()->merge(['slug' => $data['slug']]);
        }


        $this->validate(request(),[
            'kategori_adi'=>'required',
            'slug'=>(request('original_slug') != request('slug') ? 'unique:kategori,slug' : ''),


        ]);



        if($id >0 ){
            $entry=Kategori::where('id',$id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry= Kategori::create($data);
        }


        if(request()->hasFile('kategori_resmi'))
        {
            $this->validate(request(),[
                'kategori_resmi'=> 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);
            $kategori_resmi=request()->file('kategori_resmi');
            //$kategori_resmi=request()->kategori_resmi;

            $dosyaadi=$entry->id . "-" . time() . "." . $kategori_resmi->extension();

            if($kategori_resmi->isValid())
            {
                $kategori_resmi->move('upload/kategoriler',$dosyaadi);

                KategoriDetay::updateOrCreate(
                    ['kategori_id' => $entry->id],
                    ['kategori_resmi'=>$dosyaadi]

                );

            }

        }





        return redirect()->route('admin.kategoriekle.duzenle',$entry->id)
            ->with('mesaj',($id> 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        $kategori=Kategori::find($id);
        $kategori->urunler()->detach();
        $kategori->delete();
        Kategori::destroy($id);
        return redirect()->route('admin.kategoriekle')
            ->with('mesaj','Kayıt Silindi')->with('mesaj_tur','success');
    }
}
