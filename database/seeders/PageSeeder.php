<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Seo;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->isLocal()) {
            Page::factory()->count(5)->create();
            Page::factory()->count(5)->hasSeo(1)->create();
        }
    }
}
