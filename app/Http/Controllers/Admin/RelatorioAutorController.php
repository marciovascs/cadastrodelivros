<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

Use App\Models\Autor;

class RelatorioAutorController extends Controller
{
    public function selecionarAutor(){

        $arrayAutores = Autor::all();

        dd($arrayAutores);

        return view('backpack::relatorioAutor', ['arrayAutores' => $arrayAutores]);

    }
}
