<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'id' => 1,
            'title' => "Cameras",
            'alias' => "Section Cameras",
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'title' => "Laptops",
            'alias' => "Section Laptopss",
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'title' => "Phones",
            'alias' => "Section Phones",
        ]);
    }
}
