<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTodayDateToPantsMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pants_measurements', function (Blueprint $table) {
            $table->string('today_date')->nullable()->after('store_id');
            $table->string('delivery_date')->nullable()->after('today_date');
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
            //
        });
    }
}
