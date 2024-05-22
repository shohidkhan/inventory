<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('suplier_invoices', function (Blueprint $table) {
            $table->id();
            $table->string("supplier_invoice_no", 100);
            $table->string("total", 50);
            $table->string("payable", 50);
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->unsignedBigInteger("suplier_id");
            $table->foreign("suplier_id")->references("id")->on("supliers")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('suplier_invoices');
    }
};
