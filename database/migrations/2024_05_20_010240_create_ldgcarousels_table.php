<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLdgcarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ldgcarousels', function (Blueprint $table) {
            $table->id();
            $table->string('photo_1');
            $table->text('description_1');
            $table->string('photo_2')->nullable();
            $table->text('description_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->text('description_3')->nullable();
            $table->foreignId('company_id')->constrained('companies');
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
        Schema::dropIfExists('ldgcarousels');
    }
}
