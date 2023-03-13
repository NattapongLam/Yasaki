<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApprovalHdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_approval_hds', function (Blueprint $table) {
            $table->id();
            $table->string('leavapp_code')->nullable(); 
            $table->string('leavapp_name')->nullable();
            $table->string('leavapp_remark')->nullable(); 
            $table->string('leavapp_status')->nullable();
            $table->string('leavapp_save')->nullable();
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
        Schema::dropIfExists('leave_approval_hds');
    }
}
