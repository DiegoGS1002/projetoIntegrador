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
            $table->foreignUuid('supplier_id')
                ->constrained('suppliers')
                ->cascadeOnDelete();// Exclui produtos se o fornecedor for excluído
            $table->string('name'); // Nome do produto
            $table->string('sku')->unique()->nullable(); // Código único (opcional)
            $table->text('description')->nullable(); // Descrição (opcional)
            $table->string('unit_of_measure')->default('unidade'); // Unidade de medida (ex: peça, kg, litro)
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->integer('stock')->default(0); // Quantidade em estoque
            $table->timestamps(); // created_at e updated_at
            $table->softDeletes(); // deleted_at (para exclusão lógica)

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
