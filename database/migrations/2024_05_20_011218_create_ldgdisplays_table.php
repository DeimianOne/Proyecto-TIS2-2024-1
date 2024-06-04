<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<<< HEAD:database/migrations/2024_05_20_011218_create_ldgdisplays_table.php
class CreateLdgdisplaysTable extends Migration
========
class CreateCommunesTable extends Migration
>>>>>>>> diego-araneda:database/migrations/2024_05_19_221750_create_communes_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2024_05_20_011218_create_ldgdisplays_table.php
        Schema::create('ldgdisplays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
========
        Schema::create('communes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('province_id')->constrained('provinces');
>>>>>>>> diego-araneda:database/migrations/2024_05_19_221750_create_communes_table.php
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
<<<<<<<< HEAD:database/migrations/2024_05_20_011218_create_ldgdisplays_table.php
        Schema::dropIfExists('ldgdisplays');
========
        Schema::dropIfExists('communes');
>>>>>>>> diego-araneda:database/migrations/2024_05_19_221750_create_communes_table.php
    }
}
