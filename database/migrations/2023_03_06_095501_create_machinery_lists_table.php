<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineryListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machinery_lists', function (Blueprint $table) {
            $table->id();
            $table->date('machinery_hd_date')->nullable();
            $table->string('machinery_hd_docuno')->nullable();
            $table->string('machinery_hd_type')->nullable();
            $table->string('ms_machine_code')->nullable();
            $table->string('ms_machine_name')->nullable();
            $table->string('department_name')->nullable();
            $table->string('machinery_hd_lcaol')->nullable();
            $table->string('ms_machine_system_name')->nullable();
            $table->string('ms_machine_service_name')->nullable();
            $table->string('machinery_hd_save')->nullable();
            $table->string('machinery_hd_note')->nullable();
            $table->integer('machinery_hd_number')->nullable();
            $table->string('machinery_hd_checksave')->nullable();
            $table->date('machinery_hd_checkdate')->nullable();
            $table->string('machinery_hd_checknote')->nullable();
            $table->bigInteger('machinery_hd_status_id')->nullable();
            $table->string('machinery_hd_personsave')->nullable();
            $table->string('vendor_code')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('machinery_hd_refdocuno')->nullable();
            $table->string('machinery_hd_pic1')->nullable();
            $table->string('machinery_hd_pic2')->nullable();
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
        Schema::dropIfExists('machinery_lists');
    }
}
