<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kullanici extends Authenticatable
{
    use SoftDeletes;
    protected $table="kullanici";
    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT='silinme_tarihi';
    protected $fillable = ['adsoyad', 'email', 'sifre','aktivasyon_anahtari','aktif_mi','adres','admin_mi','genel_bakiye','mesaj'];
    protected $hidden = ['sifre', 'aktivasyon_anahtari'];

    public function getAuthPassword()
    {
        return $this->sifre;
    }
    public function detay(){
        return $this->hasOne('App\Models\KullaniciDetay')->withDefault();
    }
}
