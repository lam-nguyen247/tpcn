<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sentence = $this->faker->sentence;
        return [
            'name' => $sentence,
            'slug' => Str::slug($sentence),
            'content' => $this->faker->paragraph(rand(50, 100)) . '<br/><img src="https://picsum.photos/'
                . rand(500, 1000) . '/' . rand(500, 1000) . '"><br/>' . $this->faker->paragraph(rand(50, 100))
        ];
    }
}
