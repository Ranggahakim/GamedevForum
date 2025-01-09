<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Game Development',
            'slug' => 'gamedev',
            'color' => fake()->hexColor()
        ]);
        
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
            'color' => fake()->hexColor()
        ]);
        
        Category::create([
            'name' => 'Graphics & Art',
            'slug' => 'graphicsart',
            'color' => fake()->hexColor()
        ]);
        
        Category::create([
            'name' => 'Audio & Music',
            'slug' => 'audiomusic',
            'color' => fake()->hexColor()
        ]);
        
        Category::create([
            'name' => 'Game Design',
            'slug' => 'gamedesign',
            'color' => fake()->hexColor()
        ]);
    }
}
