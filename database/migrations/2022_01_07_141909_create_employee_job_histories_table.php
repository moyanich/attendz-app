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
            $table->unsignedBigInteger('contract_id');
            $table->tinyInteger('notification_period')->nullable()->default(null);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('contract_id')->references('id')->on('contract_types');
            $table->timestamps();
            $table->index('employee_id');
            $table->index('contract_id');
            $table->index('department_id');
            $table->index(['employee_id', 'start_date']);
        });

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
