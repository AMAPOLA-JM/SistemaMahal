<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NoteSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_sales', function (Blueprint $table) {
            $table->id('id_note_sale');
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_user');
            $table->datetime('date_note');
            $table->boolean('state_note');
            $table->float('total_import_note');
            $table->foreign('id_client')->references('id_client')->on('clients')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note_sales');
    }
}
