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

        // GuestHouses::create([
        //     'room_name' => 'Pine tree haven',
        //     'room_details' => 'loerm imsds kosk dosk odsko ksokdosk',
        //     'room_price' => '2000',
        //     'room_location' => 'Cordova'
        // ]);

        // GuestHouses::create([
        //     'room_name' => 'Kigwa garden haven',
        //     'room_details' => 'lsdsoerm iasdasmsds kosk dosk dsdodsko ksoasdgrekdosk',
        //     'room_price' => '69000',
        //     'room_location' => 'Buagsong'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
