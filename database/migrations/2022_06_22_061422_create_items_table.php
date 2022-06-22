<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('id_item');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_brand');
            $table->string('name_item');
            $table->string('size_item');
            $table->double('unit_price_item');
            $table->double('wholesale_price_item');
            $table->text('description_item');
            $table->timestamps();
            $table->foreign('id_category')->references('id_category')->on('categories')->onDelete('cascade');
            $table->foreign('id_brand')->references('id_brand')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
