<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NoteDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_details', function (Blueprint $table) {
            $table->id('id_note_detail');
            $table->unsignedBigInteger('id_note_sale');
            $table->unsignedBigInteger('id_item');
            $table->float('quantity_note_detail');
            $table->float('total_price_note_detail');
            $table->foreign('id_note_sale')->references('id_note_sale')->on('note_sales')->onDelete('cascade');
            $table->foreign('id_item')->references('id_item')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_details');
    }
}
