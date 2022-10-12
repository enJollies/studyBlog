<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddColumnRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('role_id')->default(2);
            $table->index('role_id', 'role_user_idx');
            $table->foreign('role_id', 'role_user_fk')->on('roles')->references('id');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign('role_user_fk');
            $table->dropIndex('role_user_idx');
            $table->dropColumn('role_id');

        });
    }
}
