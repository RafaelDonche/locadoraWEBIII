<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('filmes')->insert([
            [
                'nome' => 'Harry Potter e o Cálice de Fogo',
                'ano_lancamento' => '2005',
                'diretor' => 'Mike Newell',
                'valor' => '6.99',
                'imagem' => '5MflIeqCpYKqfWEATHCdiyKbmaVuwuBamFI5Jw21.webp',
                'id_genero' => 2
            ],
            [
                'nome' => 'Como Eu Era Antes de Você',
                'ano_lancamento' => '2016 ',
                'diretor' => 'Thea Sharrock',
                'valor' => '7.99',
                'imagem' => 'RJB46kyRUAPAxzT0s30t9MbBOfL1UDb27vX9IRo4.webp',
                'id_genero' => 3
            ],
            [
                'nome' => 'Resgate',
                'ano_lancamento' => '2020',
                'diretor' => 'Sam Hargrave',
                'valor' => '15.50',
                'imagem' => 'IF0ivVCpmwByS9SB7zLdbh8V1jchKfOl7dgu0zaS.jpg',
                'id_genero' => 1
            ],
            [
                'nome' => 'A Entidade',
                'ano_lancamento' => '2012',
                'diretor' => 'Scott Derrickson',
                'valor' => '6.99',
                'imagem' => '8Luxpb0vGumbEJpMmrBfXc8JQchBExUPOyz5zrxW.jpg',
                'id_genero' => 4
            ]
        ]);
    }
}
