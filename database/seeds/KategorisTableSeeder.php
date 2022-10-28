<?php

use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kategori::create([
            'name'	=> 'Hiburan',
            'user_id'	=> '7',

            'name'	=> 'Bencana',
            'user_id'	=> '8',
    ]);
    }
}
