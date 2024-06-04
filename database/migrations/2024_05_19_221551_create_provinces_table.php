<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<<< HEAD:database/migrations/2024_05_19_221551_create_provinces_table.php
class CreateProvincesTable extends Migration
========
class CreateLdgdisplaysTable extends Migration
>>>>>>>> diego-araneda:database/migrations/2024_05_20_011218_create_ldgdisplays_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2024_05_19_221551_create_provinces_table.php
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('region_id')->constrained('regions');
========
        Schema::create('ldgdisplays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies');
>>>>>>>> diego-araneda:database/migrations/2024_05_20_011218_create_ldgdisplays_table.php
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
<<<<<<<< HEAD:database/migrations/2024_05_19_221551_create_provinces_table.php
        Schema::dropIfExists('provinces');
========
        Schema::dropIfExists('ldgdisplays');
>>>>>>>> diego-araneda:database/migrations/2024_05_20_011218_create_ldgdisplays_table.php
    }
}
