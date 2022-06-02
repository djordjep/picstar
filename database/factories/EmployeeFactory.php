<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $superior = Employee::inRandomOrder()->first() ?? null;


        return [
            'superior_id'  => $superior,
            'name'         => $this->faker->name(),
            'position'     => $this->faker->words(2, true),
            'startDate'    => $this->faker->date(),
            'endDate'      => $this->faker->date(),
        ];
    }

}
