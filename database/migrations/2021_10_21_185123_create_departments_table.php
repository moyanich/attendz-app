<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->longText('description');
            $table->unsignedBigInteger('emp_id')->nullable();  
            $table->unsignedBigInteger('manager_id')->nullable();  
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            //$table->foreign('emp_id')->references('empID')->on('employees');
            //$table->foreign('manager_id')->references('empID')->on('employees');
            //$table->foreign('supervisor_id')->references('empID')->on('employees');
            $table->index('emp_id');
            $table->index('manager_id');
            $table->index('supervisor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
