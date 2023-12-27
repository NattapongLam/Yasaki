<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoIctDocuServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ict_docu_services', function (Blueprint $table) {
            $table->id();
            $table->string('serv_type')->nullable();
            $table->string('serv_user')->nullable();
            $table->string('serv_com')->nullable();
            $table->string('serv_job')->nullable();
            $table->string('serv_dep')->nullable();
            $table->string('serv_remark')->nullable();
            $table->string('serv_case')->nullable();
            $table->string('serv_note')->nullable();
            $table->string('personsave')->nullable();
            $table->date('persondate')->nullable();
            $table->string('personcheck')->nullable();
            $table->date('checkdate')->nullable();
            $table->string('personict')->nullable();
            $table->date('ictdate')->nullable();
            $table->string('approvedsave')->nullable();
            $table->date('approveddate')->nullable();
            $table->string('close_note')->nullable();
            $table->string('close_save')->nullable();
            $table->date('close_date')->nullable();
            $table->boolean('status')->nullable()->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->string('closeit_save')->nullable();
            $table->date('closeit_date')->nullable();
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
        Schema::dropIfExists('iso_ict_docu_services');
    }
}
