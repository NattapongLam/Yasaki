<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_configs', function (Blueprint $table) {
            $table->id();
            $table->string('leav_code')->nullable(); 
            $table->string('leav_name')->nullable();
            $table->boolean('leav_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->string('leav_save')->nullable();
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
        Schema::dropIfExists('leave_configs');
    }
}
