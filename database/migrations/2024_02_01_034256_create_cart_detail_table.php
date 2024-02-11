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
        Schema::create('cart_detail', function (Blueprint $table) {
            $table->increments('id_cart_detail');
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_cart');
            $table->double('qty')->default(0);
            $table->double('harga')->default(0);
            $table->double('diskon')->default(0);
            $table->double('subtotal')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_detail');
    }
};
