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
            'thumbnail'         => 'imgs/products/Fat_Shark_Attitude_V4.jpg',
            'title'             => 'Fat Shark Attitude V4',
            'short_description' => 'blablabla......',
            'full_description'  => '...',
            'price'             => 430,
            'category'          => 'FPV'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/Fat_Shark_Dominator_V3.jpg',
            'title'             => 'Fat Shark Dominator V3',
            'short_description' => 'blablabla......',
            'full_description'  => '...',
            'price'             => 378,
            'category'          => 'FPV'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/Fat_Shark_HD3.jpg',
            'title'             => 'Fat Shark HD3',
            'short_description' => 'blablabla......',
            'full_description'  => '...',
            'price'             => 409,
            'category'          => 'FPV'
        ]);
        $product->save();

    }
}
