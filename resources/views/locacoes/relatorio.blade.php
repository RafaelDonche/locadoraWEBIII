<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title></title>
        <style>
        * {
            font-family: arial, sans-serif;
        }
        h1 {
            font-size: 2.5rem;
            text-align: center;
        }
        table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: solid 1px gray;
            padding: 0.5rem;
            font-size: 1.2rem;
            text-align: center;
        }
        </style>
    </head>
    <body>
        <h1>Relatório de Locações</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Data do empréstimo</th>
                    <th>Prazo de devolução</th>
                    <th>Filmes</th>
                    <th>Valor total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locacoes as $l)
                @php
                    $total = 0;
                @endphp
                <tr>
                    <td>{{$l->id}}</td>
                    <td>{{$l->cliente->nome}}</td>
                    <td>{{ date('d/m/Y', strtotime($l->data_emprestimo)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($l->data_devolucao)) }}</td>
                    <td>
                        <ul>
                            @foreach ($l->filmes as $filmes)
                                <li>{{ $filmes->filme->nome }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @foreach ($l->filmes as $filmes)
                        @php
                            $total = $total + $filmes->filme->valor;
                        @endphp
                        @endforeach
                        R$ {{ number_format($total, '2', ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
