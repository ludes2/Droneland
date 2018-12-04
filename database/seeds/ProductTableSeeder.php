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
            'thumbnail'         => 'imgs/products/tbs_oblivion_rtf.jpg',
            'title'             => 'TBS Oblivion RTF',
            'short_description' => 'Der erste Racing Copter mit einem Unibody aus spritzgegossenem Polymerkomposite. 120km/h Top Geschwindigkeit und bis zu 11 Minuten Flugzeit. Flugfertiges Komplettset.',
            'full_description'  => '...',
            'price'             => 660,
            'category'          => 'Ready to fly'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/parrot_bebop_2.jpg',
            'title'             => 'Parrot Bebop 2 RTF',
            'short_description' => 'Schnelle, wendige und leichte Kamera-Drohne für jede Gelegenheit. Parrot Bebop 2 ist die erste Kamera-Drohne in der 500g-Kategorie mit 25 Minuten Flugzeit. Mit Parrot Bebop 2 fliegen Sie vollkommen sicher. Dank zahlreicher Sicherheitssysteme ist sie sowohl für Innen- als auch Außenflüge geeignet.',
            'full_description'  => '...',
            'price'             => 479,
            'category'          => 'Ready to fly'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/sandrock_mini_drohne_rtf.jpg',
            'title'             => 'SANROCK mini Drohne für Anfänger',
            'short_description' => 'SANROCK Mini Drohne für Kinder und Anfänger GD65A RC Drone Quadrocopter mit Höhe-halten, Kopflos-Modus, EIN-Tasten-Rückkehr, Spielzeug Drone für Kinder und Anfänger.',
            'full_description'  => '...',
            'price'             => 35,
            'category'          => 'Ready to fly'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/eachine_tiny_whoop_bnf.jpg',
            'title'             => 'Eachine E010S Tiny Whoop BNF Copter ',
            'short_description' => 'The Eachine E010S is probably the best ready to go Tiny Whoop on the whole market. Featuring a F3 FC with built in FrSky receiver, 40CH 25mw VTX and a 800TVL camera. Everything built into one tiny 65mm wheelbase package. The prop guards make sure it\'s safe to fly indoors. ',
            'full_description'  => '...',
            'price'             => 70,
            'category'          => 'Bind and fly'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/furious_fpv_moskito_70_frsky.jpg',
            'title'             => 'Furious FPV Moskito 70 Micro Brushless Quad BNF ',
            'short_description' => 'Uber small and micron light 70mm Micro Brushless FPV Quadcopter from Furious FPV, 4:1 power to weight ratio, BNF (FrSky) - Diversity Edition',
            'full_description'  => '...',
            'price'             => 279,
            'category'          => 'Bind and fly'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/immersionrc_vortex_230_mojo.jpg',
            'title'             => 'ImmersionRC Vortex 230 Mojo',
            'short_description' => 'The newest Vortex family member, the Vortex 230 Mojo. Even more power with the accustomed quality from ImmersionRC!',
            'full_description'  => '...',
            'price'             => 329,
            'category'          => 'Plug and play'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/emax_hawk_5_pnp_quadcopter.jpg',
            'title'             => 'Emax Hawk 5 PNP Quadcopter',
            'short_description' => 'Hawk 5 PNP Quadcopter, installed with the latest in drone racing technology, ideal for new pilots with high standards.',
            'full_description'  => '...',
            'price'             => 259,
            'category'          => 'Plug and play'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/racekraft_5051_tcs_midnight_star_2_x_cw_2_x_ccw.jpg',
            'title'             => 'RaceKraft 5051 TCS - Blue (2 x CW + 2 x CCW)',
            'short_description' => 'RaceKraft 5051 Tri-Blade TCS (Triple Crane Style) Set of 4 props.',
            'full_description'  => '...',
            'price'             => 4.90,
            'category'          => 'propeller'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/xnova_lightning_2207_2300kv.jpg',
            'title'             => 'XNOVA Lightning 2207 2300Kv',
            'short_description' => 'The new 2207 Lightning series: Even more power and efficiency at a reasonable price!',
            'full_description'  => '...',
            'price'             => 26.90,
            'category'          => 'Motors'
        ]);
        $product->save();

        $product = new \App\Product([
        'thumbnail'         => 'imgs/products/hobbywing_xrotor_blheli32_45a_4in1_ds1200_esc_2_6s.jpg',
        'title'             => 'Hobbywing XRotor BLHeli_32 45A 4in1 DS1200 ESC 2-6S',
        'short_description' => 'Highly integrated and compact 45A 4 in 1 BLHeli_32 ESC with built in Current Sensor and BEC, stackable with the XRotor Micro Flight Controller F4 G2!',
        'full_description'  => '...',
        'price'             => 64.90,
        'category'          => 'ESC'
    ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/matek_f405_ctr_flight_controller.jpg',
            'title'             => 'Matek F405-CTR Flight Controller',
            'short_description' => 'The improved version of the popular F405-AIO is here, with integrated silicone grommets and a less sensitive MPU6000 gyro',
            'full_description'  => '...',
            'price'             => 44.90,
            'category'          => 'Flight Controller'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/lumenier_dlux_osd_on_screen_display.jpg',
            'title'             => 'Lumenier DLUX OSD (On Screen Display)',
            'short_description' => 'The Lumenier DLUX OSD (On Screen Display) provides critical flight telemetry data overlaid onto the FPV feed.',
            'full_description'  => '...',
            'price'             => 38.90,
            'category'          => "OSD's"
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/lumenier_axii_58ghz_antenna_2pcs.jpg',
            'title'             => 'Lumenier AXII 5.8GHz Antenna (2pcs)',
            'short_description' => 'The revolutionary Lumenier AXII 5.8GHz Antenna (RHCP) with SMA connector. A mini sized 5.8GHz FPV antenna with a 1.6dBic gain and near perfect axial ratio.',
            'full_description'  => '...',
            'price'             => 49,
            'category'          => 'FPV Antennen'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/immersionrc_rapidfire_58ghz_receiver_diversity_module.jpg',
            'title'             => 'ImmersionRC RapidFIRE 5.8GHz Receiver Diversity Module',
            'short_description' => 'ImmersionRC rapidFIRE Goggle Module for FatShark goggles.',
            'full_description'  => '...',
            'price'             => 159,
            'category'          => 'A/V Transmitter'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/13_inch_replacement_cameras_lens_28mm.jpg',
            'title'             => '1/3-inch Replacement Cameras Lens (2.8mm)',
            'short_description' => '2.8mm replacement cameras lens for 1/3-INCH CMOS FPV-cameras',
            'full_description'  => '...',
            'price'             => 8.90,
            'category'          => 'FPV Accessories'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/DJI_Mavic_2_ProZoom_Fly_More_Kit.jpg',
            'title'             => '1/3-inch Replacement Cameras Lens (2.8mm)',
            'short_description' => 'Zubehörtyp: Erweiterungsset - 2 Flugakkus: LiPo 3850 mAh, 4-zellig - 2 Paar Low-Noise-Propeller für ein ruhigeres Fluggeräusch - Charging Hub: Lädt vier Batterien nacheinander entsprechend ihrer Ladestatus von hoch bis niedrig auf - Kfz-Ladegerät mit Überhitzungs- und Niederspannungsschutz - Powerbank-Adapter verwandelt den Akku in eine Powerbank',
            'full_description'  => '...',
            'price'             => 349,
            'category'          => 'DJI components'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/BETAFPV_2er_Set_300mAh_2S_Batterie_für_Beta75X.jpg',
            'title'             => 'BETAFPV 2er Set 350mAh 2S Batterie für Beta75X',
            'short_description' => 'Weight: 17g, Size: 45x17x12mm, Connector: XT30 with 20AWG silicone wire, Pack: 2S 7.4V, Rate: 35C/70C',
            'full_description'  => '...',
            'price'             => 19.90,
            'category'          => '2S Battery'
        ]);
        $product->save();

        $product = new \App\Product([
            'thumbnail'         => 'imgs/products/lowepro_quadguard_bp_x2.jpg',
            'title'             => 'Lowepro QuadGuard BP X2',
            'short_description' => 'Purpose-built FPV quad racing drone backpack with space for 2 quads with interior and exterior mounting locations.',
            'full_description'  => '...',
            'price'             => 129,
            'category'          => 'Transport'
        ]);
        $product->save();


    }
}
