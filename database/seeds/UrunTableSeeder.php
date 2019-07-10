<?php

use Illuminate\Database\Seeder;
use App\Models\Urun;
use App\Models\UrunDetay;

class UrunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Urun::truncate();
        UrunDetay::truncate();

        for($i=0; $i<30; $i++){
            $urun_adi = $faker->streetName;

            $urun = Urun::create([
                'urun_adi'=> $urun_adi,
                'slug'=> str_slug($urun_adi),
                'aciklama'=> $faker->sentence(1),
                'baslangic_tarihi'=>$faker->date('y-m-d','now'),
                'bitis_tarihi'=>$faker->date('y-m-d','now'),


            ]);
            $detay = $urun->detay()->create([
                'goster_one_cikan'=>rand(0,1),

            ]);
        }

        //DB::table('Urun')->insert(['urun_adi'=>'IphoneX','slug'=>'ıphonex','aciklama'=>'elektronik','baslangic_tarihi'=>'2019-01-02','bitis_tarihi'=>'2019-01-03']);
        //DB::table('Urun')->insert(['urun_adi'=>'Makina','slug'=>'makina','aciklama'=>'beyazesya','baslangic_tarihi'=>'2019-02-02','bitis_tarihi'=>'2019-02-03']);
        //DB::table('Urun')->insert(['urun_adi'=>'Sks','slug'=>'sks','aciklama'=>'evaletleri','baslangic_tarihi'=>'2019-03-03','bitis_tarihi'=>'2019-03-04']);
        //DB::table('Urun')->insert(['urun_adi'=>'Televizyon','slug'=>'televizyon','aciklama'=>'elektronik','baslangic_tarihi'=>'2019-05-05','bitis_tarihi'=>'2019-05-06']);
        //DB::table('Urun')->insert(['urun_adi'=>'Buzdolabı','slug'=>'buzdolabı','aciklama'=>'beyazesya','baslangic_tarihi'=>'2019-06-06','bitis_tarihi'=>'2019-06-07']);
        //DB::table('Urun')->insert(['urun_adi'=>'Tablet','slug'=>'tablet','aciklama'=>'elektronik','baslangic_tarihi'=>'2019-08-08','bitis_tarihi'=>'2019-08-09']);


        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}


