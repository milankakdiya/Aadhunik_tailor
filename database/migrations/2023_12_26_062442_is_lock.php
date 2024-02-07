<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IsLock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
           $table->string('is_lock')->default('0')->comment('0 is unlock 1 is lock')->after('profile_image');
           $table->string('is_delete')->default('0')->comment('0 is not_delete 1 is delete')->after('is_lock');
           $table->string('role')->comment('1 is super_admin 2 is store_admin  3 is factory_admin ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            //
        });
    }
}
