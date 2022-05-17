<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Position;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $state = State::all()->random();
        $city = City::where('state_id',$state->id)->get();
        return [
            'name'=>$this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'phone'=>$this->faker->e164PhoneNumber,
            'state'=>$state->name,
            'city'=>$city->random()->name,
            'address'=>$this->faker->address('address'),
            'photo'=>$this->faker->imageUrl(),
            'dob'=>$this->faker->date,
            'position_id'=>Position::all()->random()->id,
            'skill'=>'coding'
        ];
    }
}
