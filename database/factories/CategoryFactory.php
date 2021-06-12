<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'language' => Arr::random(["vi", "en"]),
            'name' => $name,
            'master_category_id' => 1,
            'slug' => Str::slug($name)
        ];
    }

    public function child()
    {
        return $this->state(function (array $attributes) {
            return [
                'category_id' => Category::factory()->create(),
            ];
        });
    }
}
