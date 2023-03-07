<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_email_unique');
            $table->string('email')->nullable()->change();
            $table->string('username')->after('email_verified_at')->unique();
            $table->string('avatar')->nullable()->comment('รูป')->after('password');
            $table->string('type')->nullable()->comment('ประเภท')->after('avatar');
            $table->string('employee_id')->nullable()->after('type');
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
            $table->string('email')->unique()->change();;
            $table->dropColumn('username');
            $table->dropColumn('avatar');
            $table->dropColumn('type');
            $table->dropColumn('employee_id');
        });
    }
}
