<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sentence = $this->faker->sentence;
        return [
            'language' => Arr::random(["vi", "en"]),
            'name' => $sentence,
            'image' => 'https://picsum.photos/' . rand(1200, 1600) . '/' . rand(500, 800),
            'slug' => Str::slug($sentence),
            'content' => $this->faker->paragraph(rand(50, 100)) . '<br/><img src="https://picsum.photos/'
                . rand(500, 1000) . '/' . rand(500, 1000) . '"><br/>' . $this->faker->paragraph(rand(50, 100))
        ];
    }
}
