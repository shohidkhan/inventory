<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('dues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references("id")->on("users")
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unsignedBigInteger("invoice_id");
            $table->foreign("invoice_id")->references("id")->on("invoices")
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unsignedBigInteger("customer_id");
            $table->foreign("customer_id")->references("id")->on("customers")
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string("total_payable", 100);
            $table->string("total_paid", 100);
            $table->string("total_due", 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('dues');
    }
};
