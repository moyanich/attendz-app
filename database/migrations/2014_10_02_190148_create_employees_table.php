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
            $table->unsignedBigInteger('id')->comment('Employee number');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('email', 50)->nullable();
            $table->string('private_email', 50)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('emergency_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('retirement_date')->nullable();
            $table->date('hire_date')->nullable()->comment('Date of hire');
            $table->char('nis', 9)->nullable()->unique();
            $table->char('trn', 9)->nullable()->unique();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('set null');
            $table->longText('current_address')->nullable();
            $table->longText('permanent_address')->nullable();
            $table->mediumText('city')->nullable();
            $table->integer('parish_id')->unsigned()->nullable();
            $table->longText('notes')->nullable();
            $table->string('photo')->nullable()->default('user.png');
            $table->tinyInteger('status_id')->nullable();
            $table->primary('id');
            $table->timestamps();
            $table->index('parish_id');
            $table->engine = 'InnoDB';
            
            //$table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            //$table->integer('status_id')->unsigned()->nullable();
            
           
           // $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            
           
        });

       /* Schema::table('employees', function (Blueprint $table) {
            $table->foreign('gender_id')->references('id')->on('genders');
        }); */

        
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
