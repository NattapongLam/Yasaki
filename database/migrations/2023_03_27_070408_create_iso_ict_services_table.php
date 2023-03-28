<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoIctServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ict_services', function (Blueprint $table) {
            $table->id();
            $table->string('itser_type');
            $table->string('employee_code');
            $table->bigInteger('com_id');
            $table->string('employee_note');
            $table->string('approval_code')->nullable();
            $table->string('person_code')->nullable();
            $table->string('person_note')->nullable();
            $table->string('employee_close')->nullable();
            $table->string('person_close')->nullable();
            $table->bigInteger('itser_status');
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
        Schema::dropIfExists('iso_ict_services');
    }
}
