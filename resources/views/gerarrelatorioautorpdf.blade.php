
{{-- Esta é a view da geração do PDF do relatório --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Autor</title>
</head>
<body>

<h1>Relatório do Autor</h1>
<h2>Nome do Autor: {{ $dados[0]->autor_nome }}</h2>

<h3>Livros:</h3>
<ul>
    @foreach ($dados as $livro_id => $livro)
        <li>

            <strong>Título:</strong> {{ $livro->livro_titulo }}
            <br>
            <strong>Assunto:</strong> {{ $livro->assunto_descricao }}

        </li>
        <hr>
    @endforeach
</ul>

</body>
</html>
