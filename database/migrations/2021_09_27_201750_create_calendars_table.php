<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->integer('id');
            $table->date('db_date')->unique();
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
            $table->integer('quarter');
            $table->integer('week');
            $table->string('day_name', 9);
            $table->string('month_name', 9);
            $table->char('holiday_flag', 1)->default('f')->nullable();
            $table->char('weekend_flag', 1)->default('f')->nullable();
            $table->string('event', 50)->nullable();
            $table->primary('id');
            $table->engine = 'MyISAM';
        });

        Schema::table('calendars', function (Blueprint $table) {
            $table->index(['year', 'month', 'day', 'db_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendars');
    }
}
