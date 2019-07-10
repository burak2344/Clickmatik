<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siparis;
use Illuminate\Http\Request;

class AdminHesapHareketiControlller extends Controller
{

    public function index(){

        $list= Siparis::orderBy('olusturulma_tarihi')->paginate(5000);

        return view('admin/hesaphareketi/kullanicihesaphareketi',compact('list'));
    }


    public function sil($id)
    {
        Siparis::destroy($id);
        return redirect()->route('admin.kullanicihesaphareketi')
            ->with('mesaj','Kayıt Silindi')->with('mesaj_tur','success');
    }
}
