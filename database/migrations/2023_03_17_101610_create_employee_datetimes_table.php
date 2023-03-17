<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDatetimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_datetimes', function (Blueprint $table) {
            $table->id();
            $table->string('emp_times_empcode')->nullable();
            $table->string('emp_times_empfullname')->nullable();
            $table->string('emp_times_depcode')->nullable();
            $table->string('emp_times_result')->nullable();
            $table->string('emp_times_remark')->nullable();
            $table->date('emp_times_date')->nullable();
            $table->string('emp_times_company')->nullable();
            $table->string('emp_times_save')->nullable();
            $table->integer('roworder')->nullable();
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
        Schema::dropIfExists('employee_datetimes');
    }
}
