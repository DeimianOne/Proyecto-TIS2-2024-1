<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('shoppingcart_id')->nullable()->constrained('shoppingcarts');
            $table->enum('sale_type', ['physical_sale', 'online_sale']);
            $table->enum('delivery_type', ['home_delivery', 'store_pickup'])->nullable();
            $table->timestamp('sale_date');
            $table->foreignId('paymentmethod_id')->constrained('paymentmethods');
            $table->enum('sale_status', ['completed', 'canceled', 'pending']);
            $table->decimal('sale_total');
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
        Schema::dropIfExists('sales');
    }
}
