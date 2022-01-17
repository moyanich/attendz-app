<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_management', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);

            $table->string('leave_accrue_enabled', 55); // yes/no
            $table->string('leave_carriedforward_enabled', 55);  // yes/no
            // Percentage of Leave Carried Forward number
            //Employees can apply for this leave type  yes/no
            // Maximum Carried Forward Amount 0
            // Carried Forward Leave Availability Period  1mth - 1 year no limit
            //  Employees can apply beyond the current leave balance   yes/no

            //  Leave Group 
            // Proportionate leaves on Joined Date  yes/no
            // Use Employee Leave Period yes/np



            $table->integer('allottedDays'); // Leaves Per Leave Period 
            $table->integer('minServiceDays');
            $table->integer('maxDaysAllowed');
            $table->string('description', 255)->nullable();
            $table->unsignedInteger('status_id');  //So we must use also an Integer Data type.
            $table->foreign('status_id')->references('id')->on('status_codes');
            $table->timestamps();

             //USE LEAVE GROUPS TO APPLY LEAVES
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_management');
    }
}
