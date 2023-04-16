<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTrashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_trashes', function (Blueprint $table) {
            $table->id();
            $table->integer('tras_listno')->nullable();
            $table->string('tras_name')->nullable();
            $table->string('tras_unit')->nullable();
            $table->boolean('tras_flag');
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
        Schema::dropIfExists('master_trashes');
    }
}
