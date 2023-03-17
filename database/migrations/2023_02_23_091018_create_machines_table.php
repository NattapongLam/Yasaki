<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('mc_code')->comment('รหัสเครื่องจักร');
            $table->string('mc_name')->comment('ชื่อเครื่องจักร');
            $table->string('mc_brand')->nullable()->comment('ยี่ห้อเครื่องจักร');
            $table->string('mc_size')->nullable()->comment('ขนาดเครื่องจักร');
            $table->date('mc_date')->nullable()->comment('วันที่ซื้อเครื่องจักร');
            $table->text('mc_remark')->nullable()->comment('รายละเอียด');
            $table->boolean('mc_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->boolean('mc_pdt')->default(true)->comment('สถานะ True-ใช้ผลิต False-ไม่ใช้ผลิต');
            $table->foreignId('mcgroup_id')->references('id')->on('machine_groups')->onDelete('cascade');
            $table->integer('mc_no')->nullable();
            $table->string('mc_save')->nullable();
            $table->string('mc_subname')->nullable();
            $table->string('mc_pic1')->nullable();
            $table->string('mc_pic2')->nullable();
            $table->string('mc_pic3')->nullable();
            $table->string('mc_pic4')->nullable();
            $table->decimal('mc_power',20,4)->nullable();
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
        Schema::dropIfExists('machines');
    }
}
