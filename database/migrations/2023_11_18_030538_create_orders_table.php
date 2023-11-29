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
        Schema::create('orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('cart_id')->constrained('carts')->onDelete('cascade');
            $table->string('id_toko')->nullable();
            $table->foreignUlid('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUlid('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('total')->default(0);
            $table->string('payment')->nullable();
            $table->enum('status', ['pending', 'delivered', 'cancelled', 'success'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
