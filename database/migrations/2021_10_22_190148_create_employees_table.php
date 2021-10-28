<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('empID');
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->string('email_address', 50)->nullable();
            $table->char('phone_number1', 25)->nullable();
            $table->char('phone_number2', 25)->nullable();
            $table->date('dob');
            $table->date('retirement_date')->nullable();
            $table->date('hire_date')->nullable();
            $table->char('nis', 9)->nullable()->unique();
            $table->char('trn', 9)->nullable()->unique();
            $table->integer('gender_id')->nullable();
            $table->longText('address')->nullable();
            $table->mediumText('city')->nullable();
            $table->integer('parish_id')->unsigned()->nullable();
            $table->longText('notes')->nullable();
            $table->integer('status_code_id')->unsigned()->nullable();
            $table->timestamps();
            $table->primary('empID');
            $table->index('parish_id');
            $table->engine = 'InnoDB';
        });
    }

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
