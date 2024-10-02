{{-- Esta é a view do PDF do relatório --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Autor</title>
</head>
<body>

<h1>Relatório do Autor</h1>
<h2>Nome do Autor: {{ $autor->nome }}</h2>

<h3>Livros:</h3>
<ul>
    @foreach ($autor->livros as $livro)
        <li>

            <strong>Título:</strong> {{ $livro->titulo }}
            <br>
            <strong>Assuntos:</strong>
            <ul>
                @foreach ($livro->assuntos as $assunto)
                    <li>{{ $assunto->descricao }}</li>
                @endforeach
            </ul>
        </li>
        <hr>
    @endforeach
</ul>

</body>
</html>
