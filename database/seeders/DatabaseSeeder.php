<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Thread;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Thread::factory(50)->recycle([
            Category::factory(4)->create(),
            User::factory(5)->create()
        ])->create();
    }
}
