<?php

use Illuminate\Database\Seeder;

class ArtikelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Artikel::create([
            'title'	=> 'Hidup Sandi',
            'content'	=> 'Pacar sandi ternyata selingkuh di balik dinding pribadinya !!',
            'user_id' => '8',
            'kategori_id' => '6',

    ]);
    }
}
