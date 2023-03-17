<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoHolderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_holder_lists', function (Blueprint $table) {
            $table->id();
            $table->string('iso_docutype_code')->nullable();
            $table->bigInteger('iso_doculist_id')->nullable();
            $table->string('iso_doculist_code')->nullable();
            $table->string('iso_doculist_name',1000)->nullable();
            $table->integer('iso_doculist_copy')->nullable();
            $table->string('iso_doculist_revision')->nullable();
            $table->integer('iso_docuholder_listno')->nullable();
            $table->string('emp_department_refcode')->nullable();
            $table->string('recipient_person')->nullable();
            $table->date('recipient_date')->nullable();
            $table->string('return_person')->nullable();
            $table->date('return_date')->nullable();
            $table->string('iso_docuholder_destroy')->nullable();
            $table->string('iso_docuholder_remark')->nullable();
            $table->string('iso_docuholder_save')->nullable();
            $table->string('iso_docuholder_status')->nullable();
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
        Schema::dropIfExists('iso_holder_lists');
    }
}
