<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RelatorioAutorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AutorRepository;

use Barryvdh\DomPDF\Facade\Pdf;

Use App\Models\Autor;
use App\Http\Requests\RelatorioAutorRequest as StoreRequest;


class RelatorioAutorController extends Controller
{
    protected $autorRepository;

    public function __construct(AutorRepository $autorRepository)
    {
        $this->autorRepository = $autorRepository;
    }

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
        /**
         * !!! sei que o autorRepository não deveria ser chamado diretamente !!!
         *
         * Acredito que deveria chamar AutorController, que chamaria Autor,
         * que chamaria o repository.
         */
        $dados = $this->autorRepository->getDadosGerarRelatorioAutorByView($autorId);
        return view('gerarrelatorioautor', compact('dados'));
    }

    /**
     * método que gera o relatório em pdf, com DomPDF
     */
    public function gerarPdfRelatorioAutor(Request $request){
        $dados = json_decode($request->input('dados'));
        $pdf = Pdf::loadView('gerarrelatorioautorpdf', compact('dados')); // Carrega a view que vai ser o pdf
        return $pdf->download('relatorio_autor.pdf'); // Faz o download do PDF
    }
}
