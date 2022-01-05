<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeJobHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_job_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('department_id');
            $table->tinyInteger('notification_period')->nullable()->default(null);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->timestamps();
            $table->index('employee_id');
        });

        /*$table->unsignedBigInteger('department_id')->nullable()->default(null);
            $table->foreign('department_id')->references('id')->on('departments');
            $table->date('start');
            $table->date('end')->nullable();
            $table->
            $table->int('notification_period')
            Job Title, Job Type, Status, Start, End, Separation Notification Period, Department


             $table->unsignedBigInteger('employee_id');
            $table->unsignedInteger('contract_id');  //So we must use also an Integer Data type.
            $table->unsignedInteger('department_id');  //So we must use also an Integer Data type.
            $table->unsignedInteger('job_id');  //So we must use also an Integer Data type.
            $table->foreign('employee_id')->references('empID')->on('employees');
            $table->date('start');
            $table->date('end')->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->index('employee_id');
            $table->index('contract_id');
            $table->index('department_id'); */

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_job_histories');
    }
}
