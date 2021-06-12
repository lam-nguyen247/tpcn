<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ConfigurationSeeder::class,
            VisitorSeeder::class,
            MasterCategorySeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            PageSeeder::class
        ]);
    }
}
