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
            $table->string('order_id')->nullable();
            $table->string('pair_no')->nullable();
            $table->string('order_status')->nullable()->comment('1 is trial 2 is delivery');
            $table->string('product_name')->nullable()->comment('1 is shirt 2 is pant 3 is kurta 4 is vest 5 is blazer 6 is servani 7 is other');
            $table->string('trial_delivery_date')->nullable();
            $table->string('rate')->nullable();
            $table->string('image')->nullable();
            $table->string('notes')->nullable();
            $table->string('is_delete')->default('0')->comment('0 is note delete 1 is delete');
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
        Schema::dropIfExists('orders');
    }
}
