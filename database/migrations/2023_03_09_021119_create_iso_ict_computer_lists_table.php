<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoIctComputerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ict_computer_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('com_listno')->nullable();
            $table->string('com_name')->nullable();
            $table->string('com_ip')->nullable();
            $table->string('com_desc')->nullable();
            $table->string('com_users')->nullable();
            $table->string('com_locat')->nullable();
            $table->string('com_type')->nullable();
            $table->string('com_status')->nullable();
            $table->string('com_os')->nullable();
            $table->string('com_ramrk')->nullable();
            $table->string('com_save')->nullable();
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
        Schema::dropIfExists('iso_ict_computer_lists');
    }
}
