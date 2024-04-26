<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBiginteger("beer_style");
            $table->unsignedBigInteger("format");
            $table->integer("litre_value");
            $table->text("image");
            $table->integer("count_views");
            $table->biginteger("stock");
            $table->unsignedBigInteger("type_product");
            $table->timestamps();

            $table->foreign('beer_style')->references('id')->on('beer_styles');
            $table->foreign('format')->references('id')->on('beer_formats');
            $table->foreign('type_product')->references('id')->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}
