<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KampanyaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('kampanya')->truncate();
        DB::table('kampanya')->insert(['kampanya_adi'=>'Paket 1','kampanya_fiyati'=>'5','kampanya_tikadedi'=>'250']);
        DB::table('kampanya')->insert(['kampanya_adi'=>'Paket 2','kampanya_fiyati'=>'10','kampanya_tikadedi'=>'750']);
        DB::table('kampanya')->insert(['kampanya_adi'=>'Paket 3','kampanya_fiyati'=>'20','kampanya_tikadedi'=>'2500']);
        DB::table('kampanya')->insert(['kampanya_adi'=>'Paket 4','kampanya_fiyati'=>'30','kampanya_tikadedi'=>'3500']);




        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
