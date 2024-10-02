<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RelatorioAutorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

Use App\Models\Autor;

use App\Http\Requests\RelatorioAutorRequest as StoreRequest;

class RelatorioAutorController extends Controller
{
    /**
     * método que exibe o select com os autores
     */
    public function selecionarAutor(){
        $arrayAutores = Autor::all();
        return view('relatorioautor', ['arrayAutores' => $arrayAutores]);
    }

    /**
     * método que gera o relatório ne tela
     */
    public function gerarRelatorioAutor(StoreRequest $request){
        $autorId = $request->input('autor_id');
        $autor = Autor::with('livros')->findOrFail($autorId);
        return view('gerarrelatorioautor', compact('autor'));
    }

    /**
     * método que gera o relatório em pdf
     */
    public function gerarPdfRelatorioAutor(){
        dd('ok - pdf');
    }
}
