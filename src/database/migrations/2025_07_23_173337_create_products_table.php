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
            $table->id();
            $table->string('name', 150);
            $table->string('description')->default('-----')->nullable();
            $table->string('barcode', 30)->unique();
            $table->string('image')->nullable();
            $table->double('buy_price');
            $table->double('sell_price');
            $table->integer('stock');
            $table->integer('stock_min');
            $table->boolean('visible')->default(true);
            $table->unsignedBigInteger('presentation_id');
            $table->foreign('presentation_id')->references('id')->on('presentations');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->softDeletes();
            $table->timestamps();
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
