<?php

namespace Database\Seeders;

use App\Models\MasterCategory;
use Illuminate\Database\Seeder;

class MasterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterCategory::insert([
            ['name' => 'posts'],
            ['name' => 'products']
        ]);
    }
}
