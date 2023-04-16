<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsoTrasheDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iso_trashe_departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_name');
            $table->string('year_name');
            $table->string('month_name');
            $table->bigInteger('tras_id');
            $table->integer('tras_listno');
            $table->string('tras_name');
            $table->string('tras_unit');
            $table->decimal('qty01',18,2)->default(0);
            $table->decimal('qty02',18,2)->default(0);
            $table->decimal('qty03',18,2)->default(0);
            $table->decimal('qty04',18,2)->default(0);
            $table->decimal('qty05',18,2)->default(0);
            $table->decimal('qty06',18,2)->default(0);
            $table->decimal('qty07',18,2)->default(0);
            $table->decimal('qty08',18,2)->default(0);
            $table->decimal('qty09',18,2)->default(0);
            $table->decimal('qty10',18,2)->default(0);
            $table->decimal('qty11',18,2)->default(0);
            $table->decimal('qty12',18,2)->default(0);
            $table->decimal('qty13',18,2)->default(0);
            $table->decimal('qty14',18,2)->default(0);
            $table->decimal('qty15',18,2)->default(0);
            $table->decimal('qty16',18,2)->default(0);
            $table->decimal('qty17',18,2)->default(0);
            $table->decimal('qty18',18,2)->default(0);
            $table->decimal('qty19',18,2)->default(0);
            $table->decimal('qty20',18,2)->default(0);
            $table->decimal('qty21',18,2)->default(0);
            $table->decimal('qty22',18,2)->default(0);
            $table->decimal('qty23',18,2)->default(0);
            $table->decimal('qty24',18,2)->default(0);
            $table->decimal('qty25',18,2)->default(0);
            $table->decimal('qty26',18,2)->default(0);
            $table->decimal('qty27',18,2)->default(0);
            $table->decimal('qty28',18,2)->default(0);
            $table->decimal('qty29',18,2)->default(0);
            $table->decimal('qty30',18,2)->default(0);
            $table->decimal('qty31',18,2)->default(0);
            $table->string('personsave');
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
        Schema::dropIfExists('iso_trashe_departments');
    }
}
