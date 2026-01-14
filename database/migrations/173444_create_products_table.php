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
            $table->uuid()->primary();
            $table->timestamps();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('unit_of_measure')->default('unidade'); // Unidade de medida (ex: peça, kg, litro)
            $table->decimal('standard_cost', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->decimal('minimum_sale_price', 8, 2)->nullable();
            $table->timestamps(); // created_at e updated_at
            $table->softDeletes(); //


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
