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
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id_cart');
            $table->unsignedBigInteger('id_user');
            $table->string('no_invoice');
            $table->enum('status_cart', ['proses', 'tidakaktif', 'aktif']);
            $table->enum('status_pembayaran', ['sudahdibayar', 'belumdibayar']);
            $table->enum('status_pengiriman', ['sudah', 'belum']);
            $table->string('no_resi')->nullable();
            $table->string('ekspedisi')->nullable();
            $table->double('subtotal')->default(0);
            $table->double('ongkir')->default(0);
            $table->double('diskon')->default(0);
            $table->double('total')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
