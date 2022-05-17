<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Department;
use App\Models\Education;
use App\Models\Employee;
use App\Models\Position;
use App\Models\State;
use App\Models\WorkHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        State::factory(8)->create();
        City::factory(40)->create();
        Department::factory(4)->create();
        Position::factory(15)->create();
        Employee::factory(20)->create();
        WorkHistory::factory(25)->create();
        Education::factory(25)->create();


    }
}
