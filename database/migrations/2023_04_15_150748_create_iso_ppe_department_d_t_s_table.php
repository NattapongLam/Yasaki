<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoPpeDepartmentDTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ppe_department_d_t_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ppe_hd_id');
            $table->integer('emp_listno');
            $table->string('emp_fullname');
            $table->boolean('action1')->nullable();
            $table->boolean('action2')->nullable();
            $table->boolean('action3')->nullable();
            $table->boolean('action4')->nullable();
            $table->boolean('action5')->nullable();
            $table->boolean('action6')->nullable();
            $table->boolean('action7')->nullable();
            $table->boolean('action8')->nullable();
            $table->boolean('action9')->nullable();
            $table->boolean('action10')->nullable();
            $table->boolean('action11')->nullable();
            $table->boolean('action12')->nullable();
            $table->boolean('action13')->nullable();
            $table->boolean('action14')->nullable();
            $table->boolean('action15')->nullable();
            $table->boolean('action16')->nullable();
            $table->boolean('action17')->nullable();
            $table->boolean('action18')->nullable();
            $table->boolean('action19')->nullable();
            $table->boolean('action20')->nullable();
            $table->boolean('action21')->nullable();
            $table->boolean('action22')->nullable();
            $table->boolean('action23')->nullable();
            $table->boolean('action24')->nullable();
            $table->boolean('action25')->nullable();
            $table->boolean('action26')->nullable();
            $table->boolean('action27')->nullable();
            $table->boolean('action28')->nullable();
            $table->boolean('action29')->nullable();
            $table->boolean('action30')->nullable();
            $table->boolean('action31')->nullable();
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
        Schema::dropIfExists('iso_ppe_department_d_t_s');
    }
}
