<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            [
                'nome' => 'Ação',
            ],
            [
                'nome' => 'Fantasia',
            ],
            [
                'nome' => 'Romance',
            ],
            [
                'nome' => 'Terror',
            ]
        ]);
    }
}
