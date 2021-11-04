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
            $table->increments('id');
            $table->string('name');
            $table->string('email_address', 50)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('emergency_number')->nullable();
            $table->date('date_of_birth');
            $table->date('retirement_date')->nullable();
            $table->date('hire_date');
            $table->char('nis', 9)->nullable()->unique();
            $table->char('trn', 9)->nullable()->unique();
            $table->integer('gender_id')->nullable();
            $table->longText('current_address')->nullable();
            $table->longText('permanent_address')->nullable();
            $table->mediumText('city')->nullable();
            $table->integer('parish_id')->unsigned()->nullable();
            $table->longText('notes')->nullable();
            $table->integer('status_code_id')->unsigned()->nullable();
            $table->timestamps();
           // $table->primary('empID');
            $table->index('parish_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
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
