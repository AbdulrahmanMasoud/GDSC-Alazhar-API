<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(4) ,
            'event_date' => $this->faker->date() ,
            'latitude' => $this->faker->randomFloat(9,9,85),
            'longitude' => $this->faker->randomFloat(9,9,85),
            'status' => $this->faker->randomElement([0,1]),
        ];
    }
}
