<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('emp_number')->nullable();
            $table->string('emp_role')->nullable()->comment('1 is cutter 2 is stitching  3 is finishing master 4 is other 5 is checker');
            $table->string('emp_profile_image')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
