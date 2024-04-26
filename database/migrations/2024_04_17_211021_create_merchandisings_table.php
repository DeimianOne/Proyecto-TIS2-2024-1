<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchandisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandisings', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->integer('view_count');
            $table->bigInteger('stock');
            $table->unsignedBigInteger('type_product');
            $table->integer('merchandising_value');
            $table->timestamps();

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
        Schema::dropIfExists('merchandisings');
    }
}
