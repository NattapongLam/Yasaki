<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoPpeDepartmentHDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ppe_department_h_d_s', function (Blueprint $table) {
            $table->id();
            $table->string('department_name');
            $table->string('year_name');
            $table->string('month_name');
            $table->string('job_desc')->nullable();
            $table->boolean('safety_01')->default(false)->comment('รองเท้าเซฟตี้');
            $table->boolean('safety_02')->default(false)->comment('ผ้าปิดจมูก');
            $table->boolean('safety_03')->default(false)->comment('ถุงมือหนัง');
            $table->boolean('safety_04')->default(false)->comment('หมวกกันฝุ่น');
            $table->boolean('safety_05')->default(false)->comment('เสื้อหน้าที่งาน(สะท้อนแสง)');
            $table->boolean('safety_06')->default(false)->comment('รองเท้าผ้าใบ');
            $table->boolean('safety_07')->default(false)->comment('ถุงมือผ้า');
            $table->boolean('safety_08')->default(false)->comment('ผ้ากันเปื้อน');
            $table->boolean('safety_09')->default(false)->comment('เสื้อแขนยาว');
            $table->boolean('safety_10')->default(false)->comment('แว่นตาเซฟตี้');
            $table->boolean('safety_11')->default(false)->comment('ถุงมือยาง');
            $table->boolean('safety_12')->default(false)->comment('หมวกเซฟตี้');
            $table->boolean('safety_13')->default(false)->comment('เอียปลั๊กอุดหู');
            $table->string('safety_other')->nullable();
            $table->string('personsave');
            $table->string('approvalsave')->nullable();
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
        Schema::dropIfExists('iso_ppe_department_h_d_s');
    }
}
