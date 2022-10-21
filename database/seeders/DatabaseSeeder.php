<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Aung Chan Oo',
            'email' => 'aco@gmail.com',
            'password'=> Hash::make('aco@Admin'),
            'is_admin'=>1,
            'profile_photo'=>'/place_holder_images/admin_profile.jpg'
        ]);
    }
}
