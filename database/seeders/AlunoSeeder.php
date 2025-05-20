<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        Aluno::create(['nome' => 'João da Silva']);
        Aluno::create(['nome' => 'Maria Oliveira']);
        Aluno::create(['nome' => 'Carlos Santos']);
        Aluno::create(['nome' => 'Ana Souza']);
    }
}



