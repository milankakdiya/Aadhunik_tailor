<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImage4ToVestBandiMeasurements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vest_bandi_measurements', function (Blueprint $table) {
            $table->string('image_4')->after('image_3')->nullable();
            $table->string('image_5')->after('image_4')->nullable();
            $table->string('image_6')->after('image_5')->nullable();
            $table->string('image_1_notes')->after('image_6')->nullable();
            $table->string('image_2_notes')->after('image_1_notes')->nullable();
            $table->string('image_3_notes')->after('image_2_notes')->nullable();
            $table->string('image_4_notes')->after('image_3_notes')->nullable();
            $table->string('image_5_notes')->after('image_4_notes')->nullable();
            $table->string('image_6_notes')->after('image_5_notes')->nullable();
            $table->string('store_code')->after('customer_id')->nullable();
            $table->string('customer_name')->after('store_code')->nullable();
            $table->string('customer_image')->after('customer_name')->nullable();
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
