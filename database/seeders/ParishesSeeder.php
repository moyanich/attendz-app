<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Parishes::factory(14)->create();
    }
}
