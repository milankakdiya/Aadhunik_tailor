<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTodayDateToVestBandiMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vest_bandi_measurements', function (Blueprint $table) {
            $table->string('today_date')->after('store_code')->nullable();
            $table->string('delivery_date')->after('today_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vest_bandi_measurements', function (Blueprint $table) {
            //
        });
    }
}
