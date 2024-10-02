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
                {{-- Início do Formulário - fiz um formulário pois vai precisar passar dados pra gerar pdf --}}
                <form action="{{ route('gerar-pdf-relatorio-autor') }}" method="POST">
                    @csrf  {{-- Token de segurança para o envio do formulário --}}

                    {{-- Mostrar os dados do autor --}}
                    <h5>Nome do Autor: {{ $autor->nome }}</h5>

                    {{-- Mostrar a lista de livros do autor --}}
                    <h6>Livros:</h6>
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
                        @endforeach
                    </ul>

                    <input type="hidden" name="autorId" value="{{ $autor->id }}">
                    <button type="submit" class="btn btn-primary mt-3">Gerar PDF</button>
                </form>
                {{-- Fim do Formulário --}}
            </div>
        </div>
    </div>

    </body>
    </html>

@endsection
