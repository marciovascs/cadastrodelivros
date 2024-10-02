<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RelatorioAutorController;

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('autor', 'AutorCrudController');
    Route::crud('assunto', 'AssuntoCrudController');
    Route::crud('livro', 'LivroCrudController');

    Route::get('/relatorio-autor', 'RelatorioAutorController@selecionarAutor')->name('relatorio-autor');
    Route::post('gerar-relatorio-autor', [RelatorioAutorController::class, 'gerarRelatorioAutor'])->name('gerar-relatorio-autor');
    Route::post('gerar-pdf-relatorio-autor', [RelatorioAutorController::class, 'gerarPdfRelatorioAutor'])->name('gerar-pdf-relatorio-autor');

});
