<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Beli extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli', function (Blueprint $table) {
            $table->id('id_beli');
            $table->string('nobukti');
            $table->string('tgl');
            $table->foreignId('id_pemasok');
            $table->string('keterangan');
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
        //  Schema::dropIfExists('satuan');
        Schema::dropIfExists('beli');
    }
}
