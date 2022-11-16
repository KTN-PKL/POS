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
        Schema::create('tokos', function (Blueprint $table) {
            $table->id('id_toko');
            $table->string('tnama');
            $table->string('talamat');
            $table->string('thp');
            $table->string('temail');
            $table->string('tpemilik');
            $table->string('twebsite');
            $table->string('tos');
            $table->string('tprintukuran');
            $table->string('tprintmodel');
            $table->string('tgambar');
            $table->string('tfooter');
            $table->string('tdiskonpersen');
            $table->string('tpajakpersen');
            $table->string('tdiskonrp');
            $table->string('tpajakrp');
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
        Schema::dropIfExists('tokos');
    }
};