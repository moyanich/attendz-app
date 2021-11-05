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

       /* Schema::table('users', function (Blueprint $table) {
            $table->integer('department_id')->nullable()->default(null);
        }); */

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->unsignedBigInteger('supervisor_id')->nullable()->default(null);
            $table->unsignedBigInteger('manager_id')->nullable()->default(null); 
            $table->foreign('manager_id')->references('id')->on('users');
            $table->foreign('supervisor_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
            /*
             //$table->integer('user_id'); 
           // $table->integer('manager_id')->nullable()->default(null); 
            //$table->integer('supervisor_id')->nullable()->default(null);
             $table->unsignedBigInteger('emp_id')->nullable()->default(null);  
            $table->unsignedBigInteger('manager_id')->nullable()->default(null); 
            $table->unsignedBigInteger('supervisor_id')->nullable()->default(null);
            $table->foreign('emp_id')->references('empID')->on('employees');
           $table->foreign('manager_id')->references('empID')->on('employees');
           $table->foreign('supervisor_id')->references('empID')->on('employees');
            $table->index('emp_id');
            $table->index('manager_id');
            $table->index('supervisor_id');  */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::table('users', function ($table) {
            $table->dropColumn('department_id');
        }); */

        Schema::dropIfExists('departments');
    }
}
