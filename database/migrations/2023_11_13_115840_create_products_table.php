<?php

use App\Http\Resources\ApiResource;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->string('desc');
            $table->string('price')->default(0);
            $table->string('image')->default(null);
            $table->string('stock')->default(0);
            $table->string('discount')->default(0);
            $table->string('total')->default(0);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
