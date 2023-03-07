<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_lists', function (Blueprint $table) {
            $table->id();
            $table->string('department_code');
            $table->string('department_name');
            $table->string('department_refcode');
            $table->boolean('department_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->string('department_save');
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
        Schema::dropIfExists('department_lists');
    }
}
