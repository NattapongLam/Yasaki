<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cust_code')->nullable();
            $table->string('cust_name')->nullable();
            $table->string('cust_amphur')->nullable();
            $table->string('cust_address')->nullable();
            $table->string('cust_country')->nullable();
            $table->string('cust_province')->nullable();
            $table->string('cust_region')->nullable();
            $table->string('cust_sale')->nullable();
            $table->string('cust_tel')->nullable();
            $table->string('cust_district')->nullable();
            $table->string('cust_zipcode')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
