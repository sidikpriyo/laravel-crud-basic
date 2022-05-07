<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name' => 'animal',
        ]);

        Categories::create([
            'name' => 'math',
        ]);

        Categories::create([
            'name' => 'general',
        ]);
    }
}
