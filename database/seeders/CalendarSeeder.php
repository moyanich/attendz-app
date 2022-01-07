<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //

       /* DB::insert('CALL fill_date_dimension(?, ?)',
            array('1960-01-01', '2040-01-01')
        );

*/
        //TODO: DOES NOT WORK 
      /*  DB::raw(
            'CALL fill_date_dimension("1960-01-01", "2050-01-01")'
        ); */

        // WORKS
        
        DB::insert('CALL fill_date_dimension("1960-01-01", "2050-01-01")'
        );
    }
}
