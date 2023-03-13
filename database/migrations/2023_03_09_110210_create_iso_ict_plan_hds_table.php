<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoIctPlanHdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ict_plan_hds', function (Blueprint $table) {
            $table->id();
            $table->string('year_name')->nullable();
            $table->string('planhd_save')->nullable();
            $table->string('planhd_remark')->nullable();
            $table->string('approval_save')->nullable();
            $table->date('approval_date')->nullable();
            $table->string('planhd_type')->nullable();
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
        Schema::dropIfExists('iso_ict_plan_hds');
    }
}
