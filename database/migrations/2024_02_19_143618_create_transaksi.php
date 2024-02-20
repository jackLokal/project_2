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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id_trans');
            $table->string('nama_pembeli');
            $table->decimal('total', 16, 2);
            $table->unsignedBigInteger('id_user');
            $table->boolean('IsDelete')->default(0);
            
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
