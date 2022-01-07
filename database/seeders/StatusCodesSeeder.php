<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\StatusCodes::factory(8)->create();
    }
}
