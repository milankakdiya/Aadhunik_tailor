<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Image4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pants_measurements', function (Blueprint $table) {
           
            $table->string('image_4')->nullable()->after('image_3');
            $table->string('image_5')->nullable()->after('image_4');
            $table->string('iamge_6')->nullable()->after('image_5');
            $table->string('image_1_notes')->nullable()->after('iamge_6');
            $table->string('image_2_notes')->nullable()->after('image_1_notes');
            $table->string('image_3_notes')->nullable()->after('image_2_notes');
            $table->string('image_4_notes')->nullable()->after('image_3_notes');
            $table->string('image_5_notes')->nullable()->after('image_4_notes');
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
        Schema::table('pants_measurements', function (Blueprint $table) {
            //
        });
    }
}
