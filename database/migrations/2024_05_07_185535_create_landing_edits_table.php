<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_edits', function (Blueprint $table) {
            $table->id();
            $table->text('nosotros')->nullable();
            $table->string('cervezas')->nullable();
            $table->string('color')->nullable();
            $table->string('red_social')->nullable();
            $table->string('bar_direccion')->nullable();
            $table->string('barImg')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->text('contactanos')->nullable();
            $table->text('consulta')->nullable();
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
        Schema::dropIfExists('landing_edits');
    }
}
