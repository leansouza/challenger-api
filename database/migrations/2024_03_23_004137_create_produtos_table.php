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
        Schema::create('produtos', function (Blueprint $table) {
            $table->integer('id_produto')->autoIncrement();
            $table->string('nome');
            $table->decimal('preco', 10, 2);
            $table->integer('id_estabelecimento');
            $table->foreign('id_estabelecimento')->references('id_estabelecimento')->on('estabelecimentos');
            $table->integer('id_categoria');
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
