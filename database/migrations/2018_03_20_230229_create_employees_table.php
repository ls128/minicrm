<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    //Creating the schema with Database Migrations
    public function up()
    {
        Schema::create('employees', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('company')->nullable()->default(null);;
            $table->foreign('company')->references('name')->on('companies');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /*
        Company ID as the foreign key
            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
