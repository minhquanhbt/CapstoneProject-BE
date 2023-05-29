<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kanji;

class KanjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Kanji::exists()){
            //N5
            Kanji::insert(['name' => 'Gia dụng']);
            Kanji::insert(['name' => 'Công nghệ']);
            Kanji::insert(['name' => 'Thực phẩm']);
        }
    }
}
