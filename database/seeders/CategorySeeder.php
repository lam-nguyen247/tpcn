<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->isLocal()) {
            Category::factory()->create();
            Category::factory()->state(['master_category_id' => 2])->create();
            Category::factory()->child()->create();
            Category::factory()->child()->create();
            Category::factory()->child()->hasChildList()->create();
            Category::factory()->create();
            Category::factory()->child()->hasChildList()->create();
        }
    }
}
