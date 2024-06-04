<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<<< HEAD:database/migrations/2024_05_16_170027_create_merchandises_table.php
class CreateMerchandisesTable extends Migration
========
class CreateBeerstylesTable extends Migration
>>>>>>>> diego-araneda:database/migrations/2024_05_16_162352_create_beerstyles_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2024_05_16_170027_create_merchandises_table.php
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
========
        Schema::create('beerstyles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
>>>>>>>> diego-araneda:database/migrations/2024_05_16_162352_create_beerstyles_table.php
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
<<<<<<<< HEAD:database/migrations/2024_05_16_170027_create_merchandises_table.php
        Schema::dropIfExists('merchandises');
========
        Schema::dropIfExists('beerstyles');
>>>>>>>> diego-araneda:database/migrations/2024_05_16_162352_create_beerstyles_table.php
    }
}
