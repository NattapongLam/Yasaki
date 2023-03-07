<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineryPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machinery_plans', function (Blueprint $table) {
            $table->id();
            $table->string('planmachine_docuno')->nullable();        
            $table->string('planmachine_year')->nullable();     
            $table->string('planmachine_month')->nullable(); 
            $table->integer('planmachine_listno')->nullable(); 
            $table->string('planmachine_mccode')->nullable();
            $table->string('planmachine_mcname')->nullable();
            $table->string('planmachine_depcode')->nullable();
            $table->boolean('planmachine_plan')->nullable()->default(true);
            $table->boolean('planmachine_action')->nullable()->default(false);
            $table->string('planmachine_save')->nullable();
            $table->string('planmachine_refdocuno')->nullable();
            $table->boolean('planmachine_flag')->nullable()->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->string('planmachine_note')->nullable();
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
        Schema::dropIfExists('machinery_plans');
    }
}
