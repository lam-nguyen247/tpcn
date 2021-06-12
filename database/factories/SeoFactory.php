<?php

namespace Database\Factories;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SeoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sentence = $this->faker->sentence;
        return [
            'title' => $sentence,
            'canonical' => Str::slug($sentence),
            'description' => $this->faker->text(150),
            'robots' => collect(['index, follow', 'noindex, nofollow'])->random()
        ];
    }
}
