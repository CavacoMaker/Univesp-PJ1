<?php

namespace App\Http\Controllers;

use App\Models\Presenca;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Aluno;
use Illuminate\Support\Facades\Storage;

class PresencaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'presencas' => 'required|array',
            'presencas.*.aluno_id' => 'required|exists:alunos,id',
            'presencas.*.presente' => 'required|boolean',
        ]);

        // Permite enviar a data, mas usa hoje como padrão
        $data = $request->input('data', now()->toDateString());

        $salvas = [];

        foreach ($request->presencas as $p) {
            $presenca = Presenca::updateOrCreate(
                ['aluno_id' => $p['aluno_id'], 'data' => $data],
                ['presente' => $p['presente']]
            );

            $salvas[] = $presenca;
        }

        return response()->json([
            'message' => 'Presenças salvas com sucesso!',
            'presencas' => $salvas,
        ]);
    }

public function exportarPdf(Request $request)
{
    $data = $request->query('data', now()->toDateString());

    $presencas = Presenca::with('aluno')
        ->where('data', $data)
        ->get();

    $pdf = Pdf::loadView('pdf.presencas', [
        'presencas' => $presencas,
        'data' => $data,
    ]);

    return $pdf->download("presencas_$data.pdf");
}
}


