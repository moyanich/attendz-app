<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Genders::factory(2)->create();
    }
}
