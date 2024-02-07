<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlazerJodhpuriMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blazer__jodhpuri_measurements', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id')->nullable();
            $table->string('blazer')->nullable();
            $table->string('jodhpuri')->nullable();
            $table->string('length_measurement')->nullable();
            $table->string('length_notes')->nullable();
            $table->string('sleeve_length_measurement')->nullable();
            $table->string('sleeve_length_notes')->nullable();
            $table->string('biceps_measurement')->nullable();
            $table->string('biceps_notes')->nullable();
            $table->string('forearm_measurement')->nullable();
            $table->string('forearm_notes')->nullable();
            $table->string('wrist_measurement')->nullable();
            $table->string('wrist_notes')->nullable();
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
            $table->string('is_delete')->default('0')->comment('0 is notdelete 1 is delete');
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
        Schema::dropIfExists('blazer__jodhpuri_measurements');
    }
}
