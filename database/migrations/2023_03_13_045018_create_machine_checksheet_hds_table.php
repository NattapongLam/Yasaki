<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineChecksheetHdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_checksheet_hds', function (Blueprint $table) {
            $table->id();
            $table->date('checksheetmc_hd_date')->nullable();
            $table->string('checksheetmc_hd_docuno')->nullable();
            $table->string('ms_machine_code')->nullable();
            $table->string('ms_machine_name')->nullable();
            $table->string('ms_machine_group_code')->nullable();
            $table->string('checksheetmc_hd_note')->nullable();
            $table->string('checksheetmc_hd_save')->nullable();
            $table->boolean('checksheetmc_hd_flag')->nullable()->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
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
        Schema::dropIfExists('machine_checksheet_hds');
    }
}
