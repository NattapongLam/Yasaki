<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApprovalDtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_approval_dts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('leavapp_id')->nullable();
            $table->integer('leavsub_type')->nullable()->comment('1-ตรวจสอบ 2-อนุมัติ');;
            $table->string('leavsub_empcode')->nullable();
            $table->string('leavsub_empname')->nullable();
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
        Schema::dropIfExists('leave_approval_dts');
    }
}
