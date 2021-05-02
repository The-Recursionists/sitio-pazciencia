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
        Category::create(['title' => 'nutrition']);
        Category::create(['title' => 'psychology']);
        Category::create(['title' => 'ethic']);
        Category::create(['title' => 'math']);
        Category::create(['title' => 'human rights']);
        Category::create(['title' => 'art']);
    }
}
