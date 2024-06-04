<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<<< HEAD:database/migrations/2024_05_16_162352_create_beerstyles_table.php
class CreateBeerstylesTable extends Migration
========
class CreateMerchandisesTable extends Migration
>>>>>>>> diego-araneda:database/migrations/2024_05_16_170027_create_merchandises_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2024_05_16_162352_create_beerstyles_table.php
        Schema::create('beerstyles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
========
        Schema::create('merchandises', function (Blueprint $table) {
            $table->id();
>>>>>>>> diego-araneda:database/migrations/2024_05_16_170027_create_merchandises_table.php
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
<<<<<<<< HEAD:database/migrations/2024_05_16_162352_create_beerstyles_table.php
        Schema::dropIfExists('beerstyles');
========
        Schema::dropIfExists('merchandises');
>>>>>>>> diego-araneda:database/migrations/2024_05_16_170027_create_merchandises_table.php
    }
}
