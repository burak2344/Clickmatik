<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SepetKampanya extends Model
{
    use SoftDeletes;
    protected $table="sepet_kampanya";
    protected $guarded=[];
    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT='silinme_tarihi';

    public function kampanya()
    {
        return $this->belongsTo('App\Models\Kampanya');
    }
}
