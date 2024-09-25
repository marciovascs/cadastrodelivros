<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_assunto', function (Blueprint $table) {
            // Use unsignedBigInteger para definir corretamente chaves estrangeiras
            $table->unsignedBigInteger('livro_id');
            $table->unsignedBigInteger('assunto_id');
            $table->timestamps();

            // Definindo as chaves estrangeiras corretamente
            $table->foreign('livro_id')->references('id')->on('livro')->onDelete('cascade');
            $table->foreign('assunto_id')->references('id')->on('assunto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro_assunto');
    }
};
