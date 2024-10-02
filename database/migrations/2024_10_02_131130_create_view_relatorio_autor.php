<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW view_relatorio_autor AS
            SELECT a.nome AS autor_nome,
                   l.titulo AS livro_titulo,
                   ass.descricao AS assunto_descricao
            FROM autor a
            INNER JOIN livro_autor la ON la.autor_id = a.id
            INNER JOIN livro l ON l.id = la.livro_id
            INNER JOIN livro_assunto las ON las.livro_id = l.id
            INNER JOIN assunto ass ON ass.id = las.assunto_id
            GROUP BY autor_nome, livro_titulo, assunto_descricao
            ORDER BY autor_nome, livro_titulo, assunto_descricao
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS view_relatorio_autor");
    }
};
