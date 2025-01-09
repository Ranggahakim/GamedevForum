<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        User::create([
            'name' => 'Rangga Hakim Maheswara',
            'username' => 'lort',
            'email' => 'ranggahakim05@gmail.com',
            'password' => Hash::make('1234567890'),
            'email_verified_at' => now(),
            'bio' => "Terkena Penyakit Balatro Gila",
            'remember_token' => 'rangga123'
        ]);

        User::factory(5)->create();
    }
}
