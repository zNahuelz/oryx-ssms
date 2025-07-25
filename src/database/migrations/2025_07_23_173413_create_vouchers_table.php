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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->double('subtotal');
            $table->double('igv');
            $table->double('tax');
            $table->double('total');
            $table->double('change');
            $table->boolean('paid')->default(true);
            $table->string('set',15);
            $table->string('correlative',15);
            $table->string('payment_serial')->nullable();
            $table->string('payment_image')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('voucher_type_id');
            $table->foreign('voucher_type_id')->references('id')->on('voucher_types');
            $table->unsignedBigInteger('payment_type_id');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
