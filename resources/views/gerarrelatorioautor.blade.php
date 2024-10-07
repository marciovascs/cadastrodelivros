
{{-- Esta é a view da exibição do relatório na tela --}}

@extends(backpack_view('blank'))

@section('content')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Relatório Autor</title>
    </head>
    <body>

    <div class="container mt-5">
        <div class="card mb-3">
            <div class="card-header text-primary">Relatório Autor</div>

            <div class="card-body">
                {{-- Início do Formulário --}}
                <form action="{{ route('gerar-pdf-relatorio-autor') }}" method="POST">
                    @csrf  {{-- Token de segurança para o envio do formulário --}}

                    {{-- Mostrar os dados do autor --}}
                    <h5>Nome do Autor: {{ $dados->first()->autor_nome }}</h5>

                    {{-- Mostrar a lista de livros do autor --}}
                    <h6>Livros:</h6>
                    <ul>

                        {{-- Itera sobre cada grupo de livros --}}
                        @foreach ($dados as $livro_id => $livro)
                            <li>
                                {{-- Exibe o título do livro (uma vez por grupo) --}}
                                <strong>Título:</strong> {{ $livro->livro_titulo }}
                                <br>
                                <strong>Assunto:</strong> {{ $livro->assunto_descricao }}
                            </li>
                        @endforeach
                    </ul>

                    <input type="hidden" name="dados" value="{{ $dados }}">
                    <button type="submit" class="btn btn-primary mt-3">Gerar PDF</button>
                </form>
                {{-- Fim do Formulário --}}
            </div>
        </div>
    </div>

    </body>
    </html>

@endsection
