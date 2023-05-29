<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locacaos')->insert([
            [
                'data_emprestimo' => '2023-05-10',
                'data_devolucao' => '2023-05-17',
                'id_cliente' => 1
            ],
            [
                'data_emprestimo' => '2023-05-10',
                'data_devolucao' => '2023-05-17',
                'id_cliente' => 2
            ],
            [
                'data_emprestimo' => '2023-05-15',
                'data_devolucao' => '2023-05-22',
                'id_cliente' => 3
            ],
            [
                'data_emprestimo' => '2023-05-16',
                'data_devolucao' => '2023-05-23',
                'id_cliente' => 4
            ]
        ]);
    }
}
