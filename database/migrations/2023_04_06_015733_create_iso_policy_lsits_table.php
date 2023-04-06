<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoPolicyLsitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_policy_lsits', function (Blueprint $table) {
            $table->id();
            $table->date('pol_date');
            $table->string('pol_name');
            $table->string('pol_file');
            $table->boolean('pol_status')->nullable()->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
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
        Schema::dropIfExists('iso_policy_lsits');
    }
}
