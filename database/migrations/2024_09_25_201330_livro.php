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
        Schema::create('livro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 40);
            $table->string('editora', 40);
            $table->integer('edicao');
            $table->string('ano_publicacao', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro');
    }
};
