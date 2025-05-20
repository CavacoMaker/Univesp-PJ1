<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Presenças - {{ $data }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Relatório de Presenças</h1>
    <p>Data: {{ $data }}</p>

    <table>
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Presente?</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($presencas as $presenca)
                <tr>
                    <td>{{ $presenca->aluno->nome }}</td>
                    <td>{{ $presenca->presente ? 'Sim' : 'Não' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
