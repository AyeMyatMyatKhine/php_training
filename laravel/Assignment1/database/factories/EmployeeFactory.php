<?php

namespace Database\Factories;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'region' => $this->faker->randomElements(['Yangon','Mandalay']),
            'city' => $this->faker->randomElements(['Yangon','Mandalay']),
            'dateOfJoin' => Carbon::now(),
            'department' =>$this->faker->randomElements(['IT','Marketing']),
            'created_at' => Carbon::now(),
            'updated_at' =>Carbon::now(),
        ];
    }
}
