<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('currencies')->truncate();
       DB::table('currencies')->insert([
           'title' => 'USD',
           'symbol' => '$',
           'is_main' => 0,
           'rate' => 1.08
       ]);
        DB::table('currencies')->insert([
            'title' => 'GBP',
            'symbol' => '£',
            'is_main' => 0,
            'rate' => 0.85
        ]);
        DB::table('currencies')->insert([
            'title' => 'EUR',
            'symbol' => '€',
            'is_main' => 1,
            'rate' => 1
        ]);
    }
}
