<?php

namespace App\Http\Controllers;

use App\Kullanici;
use App\Models\KullaniciDetay;
use App\Models\Sepet;
use App\Models\SepetKampanya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\KullaniciKayitMail;

use Cart;

class KullaniciController extends Controller
{

    public function __construct(){
        $this->middleware('guest')->except('oturumukapat');
    }

    public function giris_form()
    {
        return view('kullanici.oturumac');
    }

    public function giris()
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'sifre'=>'required',

        ]);
        $credentials=[
            'email'=>request('email'),
            'password'=>request('sifre'),
            'aktif_mi' =>1,
            ];
        if(auth()->attempt($credentials,request()->has('benihatirla')))
        {
            request()->session()->regenerate();

            $aktif_sepet_id = Sepet::aktif_sepet_id();
            if(is_null($aktif_sepet_id))
            {
                $aktif_sepet=Sepet::create(['kullanici_id'=>auth()->id()]);
                $aktif_sepet_id=$aktif_sepet->id;
            }
            session()->put('aktif_sepet_id' , $aktif_sepet_id);

            if(Cart::count()>0)
            {
                foreach (Cart::content() as $cartItem)
                {
                    SepetKampanya::updateOrCreate(
                        ['sepet_id'=> $aktif_sepet_id, 'kampanya_id'=> $cartItem->id],
                        ['adet'=> $cartItem->qty, 'fiyati'=> $cartItem->price, 'durum'=>'Beklemede']
                    );
                }

            }

            Cart::destroy();
            $sepetKampanyalar = SepetKampanya::with('kampanya')->where('sepet_id', $aktif_sepet_id)->get();
            foreach ($sepetKampanyalar as $sepetKampanya)
            {
                Cart::add($sepetKampanya->kampanya->id, $sepetKampanya->kampanya->kampanya_adi, $sepetKampanya->adet,  $sepetKampanya->fiyati);
            }




            return redirect()->intended('/');

        }
        else{
            $errors=['email'=>'Hatalı Giriş'];
            return back()->withErrors($errors);
        }
    }



    public function kaydol_form()
    {
        return view('kullanici.kaydol');
    }



    public function kaydol()
    {

        $this->validate(request(),[
            'adsoyad'=>'required|min:5|max:60',
            'email'=>'required|email|unique:kullanici',
            'sifre'=>'required|confirmed|min:5|max:15',
            'adres'=>'required|min:10|max:200',


        ]);

        $kullanici=Kullanici::create([


            'adsoyad'=> request('adsoyad'),
            'email'=> request('email'),
            'sifre'=> Hash::make(request('sifre')),
            'adres'=>request('adres'),
            'aktivasyon_anahtari'=> Str::random(60),
            'aktif_mi'=>0,
            'admin_mi'=>0,


        ]);
        $kullanici->detay()->save(new KullaniciDetay());
        Mail::to(request('email'))->send(new KullaniciKayitMail($kullanici));

        //auth()->login($kullanici);
        return redirect()->route('kullanici.oturumac')->with('mesaj','E-Mail Adresinizi Kontrol Edin')->with('mesaj_tur','success');

    }
    public function aktiflestir($anahtar)
    {
        $kullanici =Kullanici::where('aktivasyon_anahtari',$anahtar)->first();
        if (!is_null($kullanici))
        {
            $kullanici->aktivasyon_anahtari =null;
            $kullanici->aktif_mi =1;
            $kullanici->save();
            return redirect()->to('/')->with('mesaj','Kullanıcı kaydınız aktifleştirildi')->with('mesaj_tur','success');
        }
        else{
            return redirect()->to('/')->with('mesaj','Kullanıcı kaydınız aktiflestirilemedi')->with('mesaj_tur','warning');
        }

    }

    public function oturumukapat(){

        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('anasayfa');


    }



}
