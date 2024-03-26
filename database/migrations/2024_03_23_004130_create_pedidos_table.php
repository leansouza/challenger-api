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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('id_pedido')->autoIncrement();
            $table->integer('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->integer('id_produto');
            $table->integer('id_estabelecimento');
            $table->foreign('id_estabelecimento')->references('id_estabelecimento')->on('estabelecimentos');
            $table->dateTime('data_pedido');
            $table->decimal('valor_total', 10, 2);
            $table->integer('quantidade');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
