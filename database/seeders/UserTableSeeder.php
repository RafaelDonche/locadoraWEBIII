<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Rafael',
                'email' => 'rafaeldonche@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$6ZnbviX80oSLUzPkDIki0e8Y4twqA6.1xGQGoVp7rDpXs5AtPPvKm',
            ]
        ]);
    }
}
