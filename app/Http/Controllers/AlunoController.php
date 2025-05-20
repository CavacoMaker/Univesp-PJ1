<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return response()->json(Aluno::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $aluno = Aluno::create([
            'nome' => $request->nome,
        ]);

        return response()->json([
            'message' => 'Aluno cadastrado com sucesso!',
            'aluno' => $aluno,
        ]);
    }
}



