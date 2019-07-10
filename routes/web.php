<?php

Route::get('/','AnasayfaController@index' )->name('anasayfa');
//kullanci girişi ister
Route::get('/bakiye','BakiyeController@index' )->name('bakiye');



Route::group(['prefix'=>'kullanici'],function (){
    Route::get('/oturumac','KullaniciController@giris_form')->name('kullanici.oturumac');
    Route::post('/oturumac','KullaniciController@giris');
    Route::get('/kaydol','KullaniciController@kaydol_form')->name('kullanici.kaydol');
    Route::post('/kaydol','KullaniciController@kaydol');
    Route::get('/aktiflestir/{anahtar}','KullaniciController@aktiflestir')->name('aktiflestir');
    Route::post('/oturumukapat','KullaniciController@oturumukapat')->name('kullanici.oturumukapat');
});


Route::group(['prefix'=>'sepet'],function (){
   Route::get('/','SepetController@index')->name('sepet');
   Route::post('/ekle','SepetController@ekle')->name('sepet.ekle');
   Route::delete('/kaldir/{rowid}','SepetController@kaldir')->name('sepet.kaldir');
   Route::delete('/bosalt','SepetController@bosalt')->name('sepet.bosalt');
   Route::patch('/guncelle/{rowid}','SepetController@guncelle')->name('sepet.guncelle');
});

Route::get('/odeme','OdemeController@index')->name('odeme');
Route::post('/odemeyap','OdemeController@odemeyap')->name('odemeyap');

Route::group(['middleware'=> 'auth'],function (){

    Route::get('/siparisler','SiparisController@index')->name('siparisler');
    //kisiler bilgiler sayfası
    Route::match(['get','post'],'/bilgilerim','KullaniciBilgisiController@index')->name('kullanicibilgileri.bilgilerim');
    Route::get('/bilgilerim/duzenle/{id}','KullaniciBilgisiController@form')->name('kullanicibilgileri.bilgilerim.duzenle');
    Route::post('/bilgilerim/kaydet/{id}','KullaniciBilgisiController@kaydet')->name('kullanicibilgileri.bilgilerim.kaydet');
    Route::get('/bilgilerim/sil/{id}','KullaniciBilgisiController@sil')->name('kullanicibilgileri.bilgilerim.sil');
});


Route::get('/sorulansorular','SorulanSorularController@index')->name('sorulansorular');
Route::get('/misyonumuz','MisyonController@index')->name('misyon');
Route::get('/kazananlar','KazananlarController@index')->name('kazananlar');
Route::get('/bitenyarısmalar','BitenYarismalarController@index')->name('bitenyarismalar');
Route::get('/butunyarısmalar','ButunYarismalarController@index')->name('butunyarismalar');
Route::get('/butunyarısmalar/artan','ButunYarismalarController@artan');
Route::get('/iletisimegec','İletisimeGecController@index')->name('iletisimegec');
Route::post('/iletisimegec/yeni','İletisimeGecController@kaydet');
Route::get('/resetpassword','ResetPasswordController@index')->name('resetpassword');

// slug yapıları ile olusturulan sayfalar
Route::get('/kategori/{slug_kategoriadi}','KategoriController@index')->name('kategori');
///// Yarışmaya katıla bilmesi için kullanci girişi ister
Route::get('/urun/{slug_urunadi}','UrunController@index')->name('urun');
Route::post('/tikdenetim','UrunController@tikdenetim')->name('tikdenetim');
Route::get('/kampanya/{slug_kampanya_adi}','KampanyaController@index')->name('kampanya');

Route::group(['prefix'=>'admin',"namespace"=>"admin"],function (){
    Route::match(['get','post'], '/','AdminLoginController@oturumac')->name('admin.adminlogin');
    Route::get('/oturumukapat','AdminLoginController@oturumukapat')->name('admin.oturumukapat');

    Route::group(['middleware'=>'admin'],function (){

        Route::get('/anasayfa','AdminAnasayfaController@index')->name('admin.adminanasayfa');


//kategori bölümü
        Route::match(['get','post'],'/kategoriekle','AdminKategoriEkleControlller@index')->name('admin.kategoriekle');
        Route::get('/kategoriekle/yeni','AdminKategoriEkleControlller@form')->name('admin.kategoriekle.yeni');
        Route::get('/kategoriekle/duzenle/{id}','AdminKategoriEkleControlller@form')->name('admin.kategoriekle.duzenle');
        Route::post('/kategoriekle/kaydet/{id?}','AdminKategoriEkleControlller@kaydet')->name('admin.kategoriekle.kaydet');
        Route::get('/kategoriekle/sil/{id}','AdminKategoriEkleControlller@sil')->name('admin.kategoriekle.sil');
// ürünler Bölümü (YARIŞMALAR)
        Route::match(['get','post'],'/yarismaekle','AdminYarismaEkleControlller@index')->name('admin.yarismaekle');
        Route::get('/yarismaekle/yeni','AdminYarismaEkleControlller@form')->name('admin.yarismaekle.yeni');
        Route::get('/yarismaekle/duzenle/{id}','AdminYarismaEkleControlller@form')->name('admin.yarismaekle.duzenle');
        Route::post('/yarismaekle/kaydet/{id?}','AdminYarismaEkleControlller@kaydet')->name('admin.yarismaekle.kaydet');
        Route::get('/yarismaekle/sil/{id}','AdminYarismaEkleControlller@sil')->name('admin.yarismaekle.sil');


        //kampanya kısmı

        Route::match(['get','post'],'/kampanyaekle','AdminKampanyaEkleController@index')->name('admin.kampanyaekle');
        Route::get('/kampanyaekle/yeni','AdminKampanyaEkleController@form')->name('admin.kampanyaekle.yeni');
        Route::get('/kampanyaekle/duzenle/{id}','AdminKampanyaEkleController@form')->name('admin.kampanyaekle.duzenle');
        Route::post('/kampanyaekle/kaydet/{id?}','AdminKampanyaEkleController@kaydet')->name('admin.kampanyaekle.kaydet');
        Route::get('/kampanyaekle/sil/{id}','AdminKampanyaEkleController@sil')->name('admin.kampanyaekle.sil');


//kullanıcılar bölümü  kayıtlı kullanıcılar bölümü
        Route::match(['get','post'],'/kayitlikullanici','AdminKayitliKullaniciControlller@index')->name('admin.kayitlikullanicilar');
        Route::get('/kayitlikullanici/duzenle/{id}','AdminKayitliKullaniciControlller@form')->name('admin.kayitlikullanicilar.duzenle');
        Route::post('/kayitlikullanici/kaydet/{id}','AdminKayitliKullaniciControlller@kaydet')->name('admin.kayitlikullanicilar.kaydet');
        Route::get('/kayitlikullanici/sil/{id}','AdminKayitliKullaniciControlller@sil')->name('admin.kayitlikullanicilar.sil');


        // hesaphareketleri bölümü
        Route::match(['get','post'],'/kullanicihesaphareketi','AdminHesapHareketiControlller@index')->name('admin.kullanicihesaphareketi');
        Route::get('/kullanicihesaphareketi/sil/{id}','AdminHesapHareketiControlller@sil')->name('admin.kullanicihesaphareketi.sil');





        Route::get('/mesaj','AdminMesajControlller@index')->name('admin.mesajkutusu');

//mesaj bölümü
        Route::match(['get','post'],'/mesaj','AdminMesajControlller@index')->name('admin.mesaj');
        Route::get('/mesaj/duzenle/{id}','AdminMesajControlller@form')->name('admin.mesaj.duzenle');
        Route::post('/mesaj/kaydet/{id}','AdminMesajControlller@kaydet')->name('admin.mesaj.kaydet');
        Route::get('/mesaj/sil/{id}','AdminMesajControlller@sil')->name('admin.mesaj.sil');




    });





});
