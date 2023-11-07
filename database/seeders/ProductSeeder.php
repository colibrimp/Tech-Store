<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'title' => 'ASUS TUF F15 FX506HC',
            'description' => 'ASUS TUF F15 FX506HC 15.6" 144Hz Full HD Gaming Laptop (Intel i5-11400H, NVIDIA GeForce RTX 3050, 8GB RAM, 512GB SSD, Windows 11)',
            'price' => rand( 600, 2000),
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 2,

        ]);

        DB::table('products')->insert([
            'title' => 'ASUS Vivobook 15 X1504ZA',
            'description' => 'ASUS Vivobook 15 X1504ZA 15.6" Full HD Laptop (Intel i7-1255U, 8GB RAM, 512GB SSD, Backlit Keyboard, Wi-Fi 6E, Windows 11)',
            'price' => rand( 600, 2000),
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 2,

        ]);

        DB::table('products')->insert([
            'title' => 'Samsung Galaxy Book3',
            'description' => 'Samsung Galaxy Book3 Pro Wi-Fi Laptop, 16 Inch, 13th gen Intel Core i5 Processor, 8GB RAM, 256GB Storage, Graphite - Official',
            'price' => rand( 600, 2000),
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 2,

        ]);

        DB::table('products')->insert([
            'title' => 'Samsung Galaxy Chromebook Go',
            'description' => 'Samsung Galaxy Chromebook Go Wi-Fi Laptop, 11.6 Inch, Celeron Processor, 4GB RAM, 64GB Storage, Silver - Official',
            'price' => rand( 300, 500),
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 2,

        ]);

        DB::table('products')->insert([
            'title' => 'Nikon D60',
            'description' => 'Nikon D60 Digital SLR Camera - Black (AF-S DX Nikkor 18-55 mm f/3.5-5.6G VR) (Renewed)',
            'price' => 299,
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 1,

        ]);

        DB::table('products')->insert([
            'title' => 'Canon EOS R50',
            'description' => 'Canon EOS R50 + RF-S 18-45mm F4.5-6.3 IS STM + RF-S 55-210mm F5-7.1 IS STM – Mirrorless camera for shooting stills and videos with an ultra-compact and zoom lens, perfect for vloggers and streamers',
            'price' => 780,
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 1,

        ]);

        DB::table('products')->insert([
            'title' => 'Canon PowerShot G7 X Mark III ',
            'description' => 'Canon PowerShot G7 X Mark III Digital Camera (20.1 MP, 4.2x Optical Zoom, 7.5 cm (3 Inch) LCD Touch Screen, DIGIC 8, 4K, Full HD, WiFi, Bluetooth, Automatic Aperture, Time), Black',
            'price' => 685,
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 1,

        ]);




        DB::table('products')->insert([
            'title' => 'Fujifilm X-T30 II',
            'description' => 'Fujifilm X-T30 II + XC15-45mm black',
            'price' => 899,
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 1,

        ]);

        DB::table('products')->insert([
            'title' => 'Blackview A52 Mobile Phones(2023)',
            'description' => 'Blackview A52 Mobile Phones(2023), Android 12 Smartphone, 5180mAh, 3GB+64GB/1TB, Octa-Core, 13MP+5MP, 6.52 inch HD+ IPS Screen, 4G Dual Sim Free Unlocked UK, Face & Fingerprint Unlock - Black',
            'price' => rand( 200, 500),
            'status' => 1,
            'currency' => 'eur',
            'category_id' => 3,

        ]);

        DB::table('products')->insert([
            'title' => 'Samsung Galaxy S23 5G',
            'description' => 'Samsung Galaxy S23 5G SM-S911B/DS 256GB 8GB RAM, 50 MP Camera, Factory Unlocked, Global Version – Phantom Black',
            'price' => 635,
            'status' => 0,
            'currency' => 'eur',
            'category_id' => 3,

        ]);
    }
}
