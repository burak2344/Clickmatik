<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('kategori')->truncate();
        DB::table('kategori')->insert(['kategori_adi'=>'Elektronik Aletler','slug'=>'elektronikaletler']);
        DB::table('kategori')->insert(['kategori_adi'=>'Beyaz Eşya','slug'=>'beyazesya']);
        DB::table('kategori')->insert(['kategori_adi'=>'Ev Aletleri','slug'=>'elaletleri']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');




    }
}
