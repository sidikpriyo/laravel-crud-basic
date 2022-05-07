<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'name' => 'Book 1',
            'total' => 4
        ]);
        Book::create([
            'name' => 'Book 2',
            'total' => 3
        ]);
    }
}
