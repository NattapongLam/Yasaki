<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoIctChecksheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ict_checksheets', function (Blueprint $table) {
            $table->id();
            $table->date('cit_date');
            $table->bigInteger('com_id');
            $table->string('com_name');
            $table->boolean('cit_check1');
            $table->boolean('cit_check2');
            $table->boolean('cit_check3');
            $table->boolean('cit_check4');
            $table->boolean('cit_check5');
            $table->string('cit_remark')->nullable();
            $table->string('cit_save');
            $table->string('cit_approval')->nullable();
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
        Schema::dropIfExists('iso_ict_checksheets');
    }
}
