<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('store_id')->nullable();
            $table->string('store_code')->nullable();
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('image')->nullable();
            $table->string('add')->nullable();
            $table->string('is_delete')->default('0')->commnet('0 is not delete 1 is delete');
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
        Schema::dropIfExists('stores');
    }
}
