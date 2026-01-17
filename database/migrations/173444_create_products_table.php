<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Chave primária UUID

            // Adiciona a chave estrangeira para o fornecedor
            $table->foreignuuid('supplier_id')
                ->nullable()
                ->constrained()
                ->unique()
                ->cascadeOnDelete();// Exclui produtos se o fornecedor for excluído
            $table->string('name')->unique();
            $table->string('ean')->unique(); // Código único
            $table->text('description');
            $table->string('unit_of_measure')->default('unidade');
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->date('expiration_date')->nullable();
            $table->string('category');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
