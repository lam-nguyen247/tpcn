<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class TempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::insert([
            ['name' => 'locale', 'value' => 'vi'],
            ['name' => 'theme', 'value' => 'dark'],
        ]);
    }
}
