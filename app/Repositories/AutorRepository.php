<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class AutorRepository
{
    public function getDadosGerarRelatorioAutorByView($autorId)
    {
        return \DB::table('view_relatorio_autor')
            ->where('autor_id', $autorId)
            ->get();
    }
}
