<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineChecksheetLgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_checksheet_lgs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('checksheetmc_note_id')->nullable();
            $table->string('checksheetmc_hd_docuno')->nullable();
            $table->integer('checksheetmc_note_no')->nullable();
            $table->string('checksheetmc_note_empname')->nullable();
            $table->string('checksheetmc_note_remark')->nullable();
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
        Schema::dropIfExists('machine_checksheet_lgs');
    }
}
