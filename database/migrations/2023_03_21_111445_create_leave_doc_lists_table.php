<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveDocListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_doc_lists', function (Blueprint $table) {
            $table->id();
            $table->date('ldoc_datestart');
            $table->date('ldoc_dateend');
            $table->bigInteger('lconf_id');
            $table->bigInteger('ltype_id');
            $table->string('employee_code');
            $table->string('employee_fullname');  
            $table->bigInteger('approval_id');
            $table->string('ldoc_fileup');
            $table->string('ldoc_reamrk');
            $table->bigInteger('lsta_id');
            $table->string('ldoc_save');
            $table->string('ldoc_appsave')->nullable();
            $table->string('ldoc_appdesc')->nullable();
            $table->string('department_name')->nullable();
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
        Schema::dropIfExists('leave_doc_lists');
    }
}
