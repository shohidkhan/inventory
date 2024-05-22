<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('suplier_id');
            $table->foreign("suplier_id")->references("id")->on("supliers")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->unsignedBigInteger('brand_id');
            $table->foreign("brand_id")->references("id")->on("brands")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign("user_id")->references("id")->on("users")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign("category_id")->references("id")->on("categories")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string("name", 100);
            $table->string("stock", 50);
            $table->string("buying_price", 50);
            $table->string("price", 50);
            $table->string("unit", 50);
            $table->string("img_url", 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('products');
    }
};
