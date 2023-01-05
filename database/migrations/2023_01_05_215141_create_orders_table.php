<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientId');
            $table->unsignedBigInteger('deliveryManId');
            $table->datetime('date');
            $table->float('baseValue', 10, 2);
            $table->float('shipping', 8, 2)->nullable();
            $table->float('discount', 10, 2)->unllable();
            $table->float('amount', 8, 2);
            $table->timestamps();
            //constraints
            $table->foreign('clientId')->references('id')->on('Users');
            $table->foreign('deliveryManId')->references('id')->on('delivery_men');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
