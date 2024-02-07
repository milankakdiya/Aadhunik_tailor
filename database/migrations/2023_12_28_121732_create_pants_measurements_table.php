<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePantsMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pants_measurements', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('cut_belt')->nullable();
            $table->string('long_belt')->nullable();
            $table->string('side_pocket')->nullable();
            $table->string('side_cross_pocket')->nullable();
            $table->string('plit')->nullable();
            $table->string('without_plit')->nullable();
            $table->string('back_pocket')->nullable();
            $table->string('watch_pocket')->nullable();
            $table->string('length_measurement')->nullable();
            $table->string('length_notes')->nullable();
            $table->string('inside_length_measurement')->nullable();
            $table->string('inside_length_notes')->nullable();
            $table->string('waist_measurement')->nullable();
            $table->string('waist_notes')->nullable();
            $table->string('hips_measurement')->nullable();
            $table->string('hips_notes')->nullable();
            $table->string('fly_measurement')->nullable();
            $table->string('fly_notes')->nullable();
            $table->string('thai_measurement')->nullable();
            $table->string('thai_notes')->nullable();
            $table->string('lower_thai_measurement')->nullable();
            $table->string('lower_thai_notes')->nullable();
            $table->string('knee_measurement')->nullable();
            $table->string('knee_notes')->nullable();
            $table->string('calfs_measurement')->nullable();
            $table->string('calfs_notes')->nullable();
            $table->string('bottom_measurement')->nullable();
            $table->string('bottom_notes')->nullable();
            $table->string('add_notes')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
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
        Schema::dropIfExists('pants_measurements');
    }
}
