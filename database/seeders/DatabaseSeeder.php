<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Rating;
use App\Models\Wishlist;
use App\Models\Listing;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Listing::factory(5)->create();
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => 'asdasd'
        ]);
    }
}
