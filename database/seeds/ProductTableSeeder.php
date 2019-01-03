<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/frsky_accst_taranis_x9d_plus_special_edition_mode_2.jpg',
            'title'             => 'FrSky ACCST TARANIS X9D PLUS Special Edition - (Mode 2)',
            'short_description' => 'SPECIAL EDITION FrSky 2.4GHz ACCST TARANIS X9D PLUS Digital Telemetry Radio System (Mode 2) mit M9 Gimbals und Wassertransferdruck Grafik.',
            'full_description'  => '...',
            'price'             => 279,
            'category'          => 'Radio Systems'
        ]);
        $product->save();





    }
}
