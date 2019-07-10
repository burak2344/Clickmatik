<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriDetay extends Model
{
    protected $table = "kategori_detay";
    protected $guarded=[];

    public $timestamps=false;

    public function kategori()
    {
        return $this->belongsTo('App\Models\KategoriDetay');

    }
}
