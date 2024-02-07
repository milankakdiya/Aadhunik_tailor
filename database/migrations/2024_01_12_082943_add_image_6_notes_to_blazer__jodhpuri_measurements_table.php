<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImage6NotesToBlazerJodhpuriMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blazer__jodhpuri_measurements', function (Blueprint $table) {
           $table->string('image_6_notes')->nullable()->after('image_5_notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blazer__jodhpuri_measurements', function (Blueprint $table) {
            //
        });
    }
}
