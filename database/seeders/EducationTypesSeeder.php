<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EducationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\EducationTypes::factory(9)->create();
    }
}
