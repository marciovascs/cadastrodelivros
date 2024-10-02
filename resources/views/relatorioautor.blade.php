@extends(backpack_view('blank'))

@section('content')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>
    <body>

    <div class="container mt-5">
        <div class="card mb-3">
            <div class="card-header text-primary">Selecione o Autor </div>

            <div class="card-body">
                {{-- Início do Formulário --}}
                <form action="{{ route('gerar-relatorio-autor') }}" method="POST">
                    @csrf  {{-- Token de segurança para o envio do formulário --}}

                    <select name="autor_id" class="form-control form-select" bp-field-main-input="" required>
                        @foreach ($arrayAutores as $autor)
                            <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary mt-3">Gerar Relatório</button>
                </form>
                {{-- Fim do Formulário --}}
            </div>
        </div>
    </div>

    </body>
    </html>

@endsection
