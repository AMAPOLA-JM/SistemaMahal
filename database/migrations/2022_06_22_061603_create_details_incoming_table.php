<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsIncomingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_incoming', function (Blueprint $table) {
            $table->id('id_details_incoming');
            $table->unsignedBigInteger('id_item');
            $table->unsignedBigInteger('id_incoming');
            $table->float('numbers_details_incoming');
            $table->double('total_price_details_incoming');
            $table->timestamps();
            $table->foreign('id_item')->references('id_item')->on('items')->onDelete('cascade');
            $table->foreign('id_incoming')->references('id_incoming')->on('incomings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details_incoming');
    }
}
