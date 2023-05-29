<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'Joãozin mil grau',
                'cpf' => '111.111.111-11',
                'data_nascimento' => '2000-12-05',
            ],
            [
                'nome' => 'Mariazinha, Zika do Pantano',
                'cpf' => '222.222.222-22',
                'data_nascimento' => '1999-03-15',
            ],
            [
                'nome' => 'Larissa Manoela da Testa',
                'cpf' => '333.333.333-33',
                'data_nascimento' => '2003-06-19',
            ],
            [
                'nome' => 'Alfred, mordomo do Batman',
                'cpf' => '444.444.444-44',
                'data_nascimento' => '1910-01-01',
            ]
        ]);
    }
}
