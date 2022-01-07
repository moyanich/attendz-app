<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContractTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ContractTypes::factory(4)->create();
    }
}
