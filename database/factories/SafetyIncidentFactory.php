<?php

namespace Database\Factories;

use App\Models\SafetyIncident;
use Illuminate\Database\Eloquent\Factories\Factory;

class SafetyIncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = SafetyIncident::class;

    public function definition()
    {
        return [
            'school_id' => $this->faker->numberBetween(1, 10), // Assuming you have 10 schools
            'user_id' => $this->faker->numberBetween(1, 50), // Assuming 50 users
            'incident_type' => $this->faker->word,
            'occurred_on' => $this->faker->date(),
            'type' => $this->faker->word,
            'status' => $this->faker->word,
            'casualities' => $this->faker->randomDigit,
            'description' => $this->faker->sentence,
            'misc' => json_encode($this->faker->words(5)),
            'deleted_at' => $this->faker->optional()->dateTime,
        ];
    }
}
