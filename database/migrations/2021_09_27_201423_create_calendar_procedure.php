<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $calendar_procedure = "DROP PROCEDURE IF EXISTS `fill_date_dimension`;
        CREATE PROCEDURE `fill_date_dimension` (IN `startdate` DATE, IN `stopdate` DATE)  
        BEGIN
            DECLARE currentdate DATE;
            SET currentdate = startdate;
            WHILE currentdate < stopdate DO
                INSERT INTO calendars VALUES (
                    YEAR(currentdate)*10000+MONTH(currentdate)*100 + DAY(currentdate),
                    currentdate,
                    YEAR(currentdate),
                    MONTH(currentdate),
                    DAY(currentdate),
                    QUARTER(currentdate),
                    WEEKOFYEAR(currentdate),
                    DATE_FORMAT(currentdate,'%W'),
                    DATE_FORMAT(currentdate,'%M'),
                    'f',
                    CASE DAYOFWEEK(currentdate) WHEN 1 THEN 't' WHEN 7 then 't' ELSE 'f' END,
                    NULL);
                SET currentdate = ADDDATE(currentdate,INTERVAL 1 DAY);
            END WHILE;
        END;";

        \DB::unprepared($calendar_procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fill_date_dimension');
    }
}
