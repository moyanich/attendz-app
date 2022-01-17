<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LeaveManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\LeaveManagement::factory(3)->create();
    }
}
