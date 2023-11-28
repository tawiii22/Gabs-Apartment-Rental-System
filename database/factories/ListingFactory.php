<?php

namespace Database\Factories;

use App\Models\Bed;

use App\Models\Listing;
use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $imagePath = public_path('images');
        $images = glob($imagePath . '/*.{jpg,png,gif}', GLOB_BRACE);
        $room_images = [];

        for($i = 0; $i < 5; $i++) {
            $room_images[$i] = $images ? str_replace($imagePath . '/', '', $this->faker->randomElement($images)) : null;
        }

        $room_images_string = implode(',', $room_images);

        return [
            'room_name' => $this->faker->company(),
            'room_details' => $this->faker->sentence(9),
            'room_price' => number_format($this->faker->randomNumber(4, true), 0, '.', ','),
            'room_image' => $room_images_string,
            'room_gender' => $this->faker->randomElement(['for-boys', 'for-girls'])
        ];

    }

    public function configure()
        {
            return $this->afterCreating(function (Listing $listing) {
                for($i = 1; $i <= 4; $i++) {
                    Bed::factory(1)->create([
                        'room_id' => $listing->id,
                        'bed_number' => $i,
                        'status' => true
                    ]);
                }
            });
        }

}
