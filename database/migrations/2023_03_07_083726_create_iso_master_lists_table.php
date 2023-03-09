<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoMasterListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_master_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('iso_doculist_listno')->nullable();
            $table->date('iso_doculist_date')->nullable();
            $table->date('iso_doculist_forcedate')->nullable();
            $table->string('iso_docugroup_name')->nullable();
            $table->string('iso_docutype_code')->nullable();
            $table->string('iso_doculist_code')->nullable();
            $table->string('iso_doculist_name')->nullable();
            $table->string('iso_docustatus_name')->nullable();
            $table->string('emp_department_refcode')->nullable();
            $table->string('iso_docustatus_location')->nullable();
            $table->string('iso_docustatus_reamrk')->nullable();
            $table->boolean('iso_doculist_check')->nullable();
            $table->string('iso_doculist_partfile')->nullable();
            $table->string('iso_doculist_filename')->nullable();
            $table->string('iso_doculist_save')->nullable();
            $table->string('revision00')->nullable();
            $table->string('revision01')->nullable();
            $table->string('revision02')->nullable();
            $table->string('revision03')->nullable();
            $table->string('revision04')->nullable();
            $table->string('revision05')->nullable();
            $table->string('revision06')->nullable();
            $table->string('revision07')->nullable();
            $table->string('revision08')->nullable();
            $table->string('revision09')->nullable();
            $table->string('revision10')->nullable();
            $table->string('revision11')->nullable();
            $table->string('revision12')->nullable();
            $table->string('revision13')->nullable();
            $table->string('revision14')->nullable();
            $table->string('revision15')->nullable();
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
        Schema::dropIfExists('iso_master_lists');
    }
}
