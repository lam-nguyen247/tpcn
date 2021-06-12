<?php

namespace Database\Factories;

use App\Models\MasterCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MasterCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
