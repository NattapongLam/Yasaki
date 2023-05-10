<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingResultHdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing_result_hds', function (Blueprint $table) {
            $table->id();
            $table->date('pkgresult_date');
            $table->integer('pkgresult_empfull')->default(0);
            $table->integer('pkgresult_empqty')->default(0);
            $table->integer('pkgresult_empdel')->default(0);
            $table->integer('pkgresult_absent')->default(0);
            $table->integer('pkgresult_leave')->default(0);
            $table->integer('pkgresult_sick')->default(0);
            $table->integer('pkgresult_vacation')->default(0);
            $table->integer('pkgresult_maternity')->default(0);
            $table->string('pkgresult_remark')->nullable();
            $table->string('pkgresult_save');
            $table->boolean('pkgresult_status')->nullable()->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
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
        Schema::dropIfExists('packing_result_hds');
    }
}
