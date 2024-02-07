<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVestBandiMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vest_bandi_measurements', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('vest_coat')->nullable();
            $table->string('bandi')->nullable();
            $table->string('length_measurement')->nullable();
            $table->string('length_notes')->nullable();
            $table->string('sholders_measurement')->nullable();
            $table->string('sholders_notes')->nullable();
            $table->string('chest_measurement')->nullable();
            $table->string('chest_notes')->nullable();
            $table->string('waist_measurement')->nullable();
            $table->string('waist_notes')->nullable();
            $table->string('hips_measurement')->nullable();
            $table->string('hips_notes')->nullable();
            $table->string('collar_measurement')->nullable();
            $table->string('collar_notes')->nullable();
            $table->string('pocket_measurement')->nullable();
            $table->string('pocket_notes')->nullable();
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
        Schema::dropIfExists('vest_bandi_measurements');
    }
}
