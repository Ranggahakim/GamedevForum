<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Report;
use App\Models\Thread;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([CategorySeeder::class, UserSeeder::class]);
        Thread::factory(50)->recycle([
            Category::all(),
            User::where('isAdmin', false)->get()
        ])->create();

        Report::factory(3)->create();
    }
}
