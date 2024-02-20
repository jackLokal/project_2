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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_detail');
            $table->decimal('subtotal', 16, 2);
            $table->bigInteger('jumlah');
            $table->unsignedBigInteger('id_trans');
            $table->unsignedBigInteger('id_produk');
            $table->boolean('IsDelete')->default(0);

            $table->foreign('id_trans')->references('id_trans')->on('transaksi');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
