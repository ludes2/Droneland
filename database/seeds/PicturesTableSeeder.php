<?php

use Illuminate\Database\Seeder;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $picture = new \App\Picture([
            'path_to_picture'   => 'https://www.bhphotovideo.com/images/images2500x2500/dji_cp_pt_000500_mavic_pro_1285011.jpg',
            'product_id'        => 1
        ]);
        $picture->save();



    }
}
