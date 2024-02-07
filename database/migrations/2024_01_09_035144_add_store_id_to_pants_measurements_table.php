<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStoreIdToPantsMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pants_measurements', function (Blueprint $table) {
            $table->string('store_id')->nullable()->after('customer_id');
            $table->string('customer_name')->nullable()->after('store_id');
            $table->string('customer_image')->nullable()->after('customer_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pants_measurements', function (Blueprint $table) {
   
        });
    }
}
