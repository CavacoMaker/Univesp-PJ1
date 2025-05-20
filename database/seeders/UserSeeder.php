<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => '23227975@aluno.univesp.br'],
            ['name' => 'Josemar', 'email' => '23227975@aluno.univesp.br',
            'password' => '1234']
        );
        
        User::firstOrCreate(
            ['email' => '24206965@aluno.univesp.br'],
            ['name' => 'Guilherme', 'email' => '24206965@aluno.univesp.br',
            'password' => '1234']
        );
    }
}
