<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kazananlar extends Model
{
    protected $table='kazananlar';

    protected $guarded=[];
    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT='silinme_tarihi';
}
