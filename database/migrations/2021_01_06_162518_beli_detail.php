<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BeliDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //
        Schema::create('beli_detail', function (Blueprint $table) {
            $table->id();
            $table->string('nobukti');
            $table->foreignId('id_stok');
            $table->integer('qty');
            $table->string('hrgbeli');
            $table->string('subtotal');
            $table->string('ket');
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
        //
        Schema::dropIfExists('beli_detail');
    }
}
