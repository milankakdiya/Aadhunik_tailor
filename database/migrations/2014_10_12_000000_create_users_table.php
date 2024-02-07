<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('password')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('role')->nullable()->comment('1 is super_admin 2 is store_admin 3 is factory');
            $table->string('is_lock')->default(0)->cooment('0 is un-lock 1 is lock');
            $table->string('store_access')->nullable();
            $table->string('profile_image')->nullable();    
            $table->string('add')->nullable();
            $table->string('is_delete')->default(0)->comment('0 is not delete 1 is delete');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
