<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Presenças - {{ $data }}</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Relatório de Presença - {{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Presente</th>
            </tr>
        </thead>
        <tbody>
            @foreach($presencas as $presenca)
                <tr>
                    <td>{{ $presenca->aluno->nome }}</td>
                    <td>{{ $presenca->presente ? 'Sim' : 'Não' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
