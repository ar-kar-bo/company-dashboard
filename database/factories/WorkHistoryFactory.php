<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkHistory>
 */
class WorkHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id'=>Employee::all()->random()->id,
            'company'=>$this->faker->company,
            'position'=>$this->faker->jobTitle,
            'start_date'=>$this->faker->dateTimeInInterval('-10 years', $interval = '+ 25 days'),
            'end_date'=>$this->faker->dateTimeInInterval('-5 years', $interval = '+ 25 days'),
            'description'=>$this->faker->text
        ];
    }
}
