<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('estabelecimentos', function (Blueprint $table) {
            $table->integer('id_estabelecimento')->autoIncrement();
            $table->integer('categoria_id');
            $table->foreign('categoria_id')->references('categoria_id')->on('categoria_estabelecimentos');
            $table->string('nome');
            $table->string('descricao');
            $table->string('endereco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estabelecimentos');
    }
};
