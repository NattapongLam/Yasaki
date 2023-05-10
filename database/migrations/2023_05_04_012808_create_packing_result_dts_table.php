<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingResultDtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing_result_dts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pkgresult_id');
            $table->integer('pkgresult_listno');
            $table->string('pkgresult_pdcode');
            $table->string('pkgresult_pdname');
            $table->string('pkgresult_pdunit');
            $table->integer('pkgresult_pdqty');
            $table->string('pkgresult_note')->nullable();
            $table->boolean('pkgresult_flag')->nullable()->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->timestamps();
            $table->integer('pkgresult_pdtype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packing_result_dts');
    }
}
