<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePlantipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_plantips', function (Blueprint $table) {
            $table->id();
            $table->date('tip_date');
            $table->bigInteger('cust_id');
            $table->string('tip_remark')->nullable();
            $table->string('tip_type')->nullable();
            $table->boolean('tip_plan')->nullable();
            $table->boolean('tip_action')->nullable();
            $table->boolean('tip_flag')->nullable();
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
        Schema::dropIfExists('sale_plantips');
    }
}
