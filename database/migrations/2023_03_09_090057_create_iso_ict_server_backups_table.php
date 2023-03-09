<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoIctServerBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_ict_server_backups', function (Blueprint $table) {
            $table->id();
            $table->string('year_name')->nullable();
            $table->bigInteger('month_id')->nullable();
            $table->string('ck_day01',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day02',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day03',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day04',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day05',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day06',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day07',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day08',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day09',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day10',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day11',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day12',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day13',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day14',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day15',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day16',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day17',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day18',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day19',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day20',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day21',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day22',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day23',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day24',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day25',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day26',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day27',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day28',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day29',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day30',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('ck_day31',1)->nullable()->comment('สถานะ ป-ปกติ ผ-ผิดปกติ ก-แก้ไข');
            $table->string('backup_save')->nullable();
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
        Schema::dropIfExists('iso_ict_server_backups');
    }
}
