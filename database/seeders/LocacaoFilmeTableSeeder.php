<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocacaoFilmeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locacao_filmes')->insert([
            [
                'id_locacao' => 1,
                'id_filme' => 1,
            ],
            [
                'id_locacao' => 1,
                'id_filme' => 2,
            ],
            [
                'id_locacao' => 2,
                'id_filme' => 2,
            ],
            [
                'id_locacao' => 2,
                'id_filme' => 1,
            ],
            [
                'id_locacao' => 2,
                'id_filme' => 3,
            ],
            [
                'id_locacao' => 3,
                'id_filme' => 4,
            ],
            [
                'id_locacao' => 4,
                'id_filme' => 4,
            ]
        ]);
    }
}
