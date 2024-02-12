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
            $table->string('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('title');
            $table->string('image')->default(null);
            $table->integer('quantity');
            $table->string('note')->default(null);
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
