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
        Schema::create('livro_autor', function (Blueprint $table) {
            $table->unsignedBigInteger('livro_id');
            $table->unsignedBigInteger('autor_id');
            $table->timestamps();

            // Definindo as chaves estrangeiras
            $table->foreign('livro_id')->references('id')->on('livro')->onDelete('cascade');
            $table->foreign('autor_id')->references('id')->on('autor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro_autor');
    }
};
