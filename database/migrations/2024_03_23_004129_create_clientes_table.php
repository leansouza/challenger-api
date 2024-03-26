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
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer('id_cliente')->autoIncrement();
            $table->string('nome');
            $table->string('email')->default('test@example.com');
            $table->string('senha')->default('123');
            $table->decimal('saldo_bonus', 10, 2)->default(1000.00);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
