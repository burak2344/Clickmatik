<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKazananlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kazananlar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('yarisma_id')->unsigned();
            $table->integer('kazanan_id')->unsigned();
            $table->integer('tiklanansayi')->nullable();
            $table->string('adsoyad',60)->nullable();
            $table->string('urun_id',60)->nullable();
            $table->timestamp('olusturulma_tarihi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncelleme_tarihi')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kazananlar');
    }
}
