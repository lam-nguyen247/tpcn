<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visitor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'source' => collect(['facebook', 'google'])->random(),
            'ip' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
            'created_at' => now()->subDays(rand(0, 100))
        ];
    }

    /**
     * Indicate that the location is fetched.
     */
    public function fetched()
    {
        return $this->state(function (array $attributes) {
            return [
                'region' => $this->faker->city,
                'country' => $this->faker->country,
                'latitude' => $this->faker->latitude,
                'longitude' => $this->faker->longitude,
                'timezone' => $this->faker->timezone,
                'organization' => $this->faker->company,
                'as' => $this->faker->bs,
                'use_mobile_connection' => $this->faker->boolean,
                'use_proxy' => $this->faker->boolean,
                'status' => 1,
            ];
        });
    }
}
