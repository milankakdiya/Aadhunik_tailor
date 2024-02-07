<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('customer_name')->nullale();
            $table->string('phone_number')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('trial_date')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('invoice_type')->nullable()->comment('1 is normal invoice 2 is alteration invoice');
            $table->string('total')->nullable();
            $table->string('paid')->nullable();
            $table->string('discount')->nullable();
            $table->string('shirt_order_id')->nullable();
            $table->string('pant_order_id')->nullable();
            $table->string('kurta_order_id')->nullable();
            $table->string('vest_order_id')->nullable();
            $table->string('blazer_order_id')->nullable();
            $table->string('servani_order_id')->nullable();
            $table->string('other_order_id')->nullable();
            $table->string('is_delete')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
