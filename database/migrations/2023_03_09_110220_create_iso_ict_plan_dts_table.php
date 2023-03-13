<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoIctPlanDtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ict_plan_dts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('planhd_id')->nullable();
            $table->integer('plandt_listno')->nullable();
            $table->string('plandt_comname')->nullable();
            $table->string('plandt_comlocat')->nullable();
            $table->string('plandt_person')->nullable();
            $table->string('plandt_reamrk')->nullable();
            $table->boolean('plandt_check01')->nullable();
            $table->boolean('plandt_action01')->nullable();
            $table->boolean('plandt_check02')->nullable();
            $table->boolean('plandt_action02')->nullable();
            $table->boolean('plandt_check03')->nullable();
            $table->boolean('plandt_action03')->nullable();
            $table->boolean('plandt_check04')->nullable();
            $table->boolean('plandt_action04')->nullable();
            $table->boolean('plandt_check05')->nullable();
            $table->boolean('plandt_action05')->nullable();
            $table->boolean('plandt_check06')->nullable();
            $table->boolean('plandt_action06')->nullable();
            $table->boolean('plandt_check07')->nullable();
            $table->boolean('plandt_action07')->nullable();
            $table->boolean('plandt_check08')->nullable();
            $table->boolean('plandt_action08')->nullable();
            $table->boolean('plandt_check09')->nullable();
            $table->boolean('plandt_action09')->nullable();
            $table->boolean('plandt_check10')->nullable();
            $table->boolean('plandt_action10')->nullable();
            $table->boolean('plandt_check11')->nullable();
            $table->boolean('plandt_action11')->nullable();
            $table->boolean('plandt_check12')->nullable();
            $table->boolean('plandt_action12')->nullable();
            $table->bigInteger('com_id')->nullable();
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
        Schema::dropIfExists('iso_ict_plan_dts');
    }
}
