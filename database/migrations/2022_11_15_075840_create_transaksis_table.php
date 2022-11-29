<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id_transaksi', 7)->primary();
            $table->string('total')->nullable();
            $table->string('id_customer')->nullable();
            $table->string('atasnama')->nullable();
            $table->string('grandtotal')->nullable();
            $table->string('discountrate')->nullable();
            $table->string('pajakrate')->nullable();
            $table->string('discount')->nullable();
            $table->string('pajak')->nullable();
            $table->string('status')->nullable();
            $table->string('order')->nullable();
            $table->string('bayar')->nullable();
            $table->string('kembali')->nullable();
            $table->timestamp('waktut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
