<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentHistorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_historys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }


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

            
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employment_historys');
    }
}
