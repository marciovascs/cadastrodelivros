<?php

namespace App\Services;

use App\Models\Livro;

class LivroService
{
    public function criarLivro(array $data)
    {
        // Cria o livro
        $objLivro = Livro::create($data);

        // Associar os assuntos ao livro - salvar em livro_assunto
        if (!empty($data['assuntos'])) {
            $objLivro->assuntos()->attach($data['assuntos']);
        }

        // Associar os autores ao livro - salvar em livro_autor
        if (!empty($data['autores'])) {
            $objLivro->autores()->attach($data['autores']);
        }
    }
}
