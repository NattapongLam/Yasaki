<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineryListSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machinery_list_subs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('machinery_hd_id')->nullable();
            $table->string('machinery_hd_docuno')->nullable();
            $table->integer('machinery_dt_listno')->nullable();
            $table->string('machinery_dt_remark')->nullable();
            $table->decimal('machinery_dt_hour')->nullable();
            $table->date('machinery_dt_date')->nullable();
            $table->boolean('machinery_dt_flag')->nullable()->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->bigInteger('machinery_dt_id')->nullable();
            $table->bigInteger('mclist_id')->nullable();
            $table->bigInteger('machinery_hd_id')->nullable();
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
        Schema::dropIfExists('machinery_list_subs');
    }
}
