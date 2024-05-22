<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('suplier_invoice_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suplier_invoice_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('suplier_invoice_id')->references('id')->on('suplier_invoices')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('product_id')->references('id')->on('products')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unsignedBigInteger("brand_id");
            $table->foreign("brand_id")->references("id")->on("brands")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('qty', 50);
            $table->string("purchase_price", 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('suplier_invoice_products');
    }
};
