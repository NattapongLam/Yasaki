<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_lists', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code')->nullable();
            $table->string('employee_fullname')->nullable();     
            $table->string('employee_company')->nullable();
            $table->string('employee_job')->nullable();
            $table->string('employee_taxid')->nullable();
            $table->string('employee_sex')->nullable();
            $table->string('employee_country')->nullable();
            $table->string('employee_image')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->string('department_code')->nullable();
            $table->bigInteger('approval_id')->nullable();
            $table->boolean('employee_status')->nullable()->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->string('employee_save')->nullable();
            $table->bigInteger('employee_id')->nullable(); 
            $table->date('employee_date')->nullable();    
            $table->string('employee_tel')->nullable();
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
        Schema::dropIfExists('employee_lists');
    }
}
