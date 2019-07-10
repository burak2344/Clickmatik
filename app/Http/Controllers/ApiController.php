<?php

namespace App\Http\Controllers;

use App\Kullanici;
use App\Models\Kampanya;
use App\Models\KullaniciDetay;
use App\Models\Mesaj;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function bilgilerim()
    {
        //echo "addas";
        $data = User::all();
        return $data;
    }
    public function bilgiekle()
    {
        //echo "addas";

        $kullanici = Kullanici::create([


            'adsoyad' => request('adsoyad'),
            'email' => request('email'),
            'sifre' => Hash::make(request('sifre')),
            'adres' => request('adres'),
            'aktivasyon_anahtari' => Str::random(60),
            'aktif_mi' => 0,
            'admin_mi' => 0,


        ]);
        if ($kullanici != null) {
            return "Ekleme İşlemi Başarılı";
        }

    }

    public function bilgisil($id)
    {
        //echo "addas";

        $kullanici = Kullanici::destroy($id);
        if ($kullanici != null) {
            return "Silme İşlemi Başarılı";
        }

    }
    public function bilgiguncelle($id)

    {
        $kullanici=Kullanici::where('id',$id);

        $kullanici->update([


            'adsoyad' => request('adsoyad'),
            'email' => request('email'),
            'sifre' => Hash::make(request('sifre')),
            'adres' => request('adres'),
            'aktivasyon_anahtari' => Str::random(60),
            'aktif_mi' => 0,
            'admin_mi' => 0,


        ]);

        if ($kullanici != null) {
            return "Güncelleme İşlemi Başarılı";
        }

    }
    public function detay()
    {
        //echo "addas";
        $data = KullaniciDetay::all();
        return $data;
    }
    public function tumkullanici()
    {
        //echo "addas";
        $data = Kullanici::all();
        return $data;
    }
    public function iletisim()
    {
        //echo "addas";

        $mesaj = Mesaj::create([


            'adsoyad' => request('adsoyad'),
            'email' => request('email'),
            'mesaj' => request('mesaj'),


        ]);
        if ($mesaj != null) {
            return "Mesaj İşlemi Başarılı";
        }

    }
    public function kampanyaekle()
    {
        //echo "addas";

        $kampanya = Kampanya::create([


            'kampanya_adi' => request('kampanya_adi'),
            'kampanya_fiyati' => request('kampanya_fiyati'),
            'kampanya_tikadedi' => request('kampanya_tikadedi'),



        ]);
        if ($kampanya != null) {
            return "Kampanya Ekleme İşlemi Başarılı";
        }

    }
    public function kampanyaguncelle($id)

    {
        $kampanya=Kampanya::where('id',$id);

        $kampanya->update([


            'kampanya_adi' => request('kampanya_adi'),
            'kampanya_fiyati' => request('kampanya_fiyati'),
            'kampanya_tikadedi' => request('kampanya_tikadedi'),


        ]);

        if ($kampanya != null) {
            return "Güncelleme İşlemi Başarılı";
        }

    }
    public function kampanyasil($id)
    {
        //echo "addas";

        $kampanya = Kampanya::destroy($id);
        if ($kampanya != null) {
            return "Silme İşlemi Başarılı";
        }

    }
}
