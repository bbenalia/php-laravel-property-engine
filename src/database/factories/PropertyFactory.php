<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aG91c2V8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80",
            "https://images.adsttc.com/media/images/5ecd/d4ac/b357/65c6/7300/009d/large_jpg/02C.jpg?1590547607",
            "https://images.unsplash.com/photo-1513584684374-8bab748fbf90?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1046&q=80",
            "https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80"
        ];

        return [
            "description"      => $this->faker->sentence($nbWords = 12, $variableNbWords = true),
            "street"           => $this->faker->streetAddress(),
            "number"           => $this->faker->randomNumber($nbDigits = 4, $strict = false),
            "city"             => $this->faker->city(),
            "province"         => $this->faker->state(),
            "country"          => $this->faker->country(),
            "status"           => $this->faker->randomElement(['available']),
            "type"             => $this->faker->randomElement(['flat/apartment', 'house']),
            "contact_email"    => $this->faker->email(),
            "contact_phone"    => $this->faker->phoneNumber(),
            "condition"        => $this->faker->randomElement(['good', 'new']),
            "equipment"        => $this->faker->randomElement(['furnished', 'unfurnished']),
            "room"             => $this->faker->numberBetween($min = 1, $max = 7),
            "bath"             => $this->faker->numberBetween($min = 1, $max = 4),
            "size"             => $this->faker->numberBetween($min = 40, $max = 250),
            "price"            => $this->faker->numberBetween($min = 100000, $max = 500000),
            "pet"              => $this->faker->boolean(),
            "garden"           => $this->faker->boolean(),
            "air_conditioning" => $this->faker->boolean(),
            "swimming_pool"    => $this->faker->boolean(),
            "terrace"          => $this->faker->boolean(),
            "image"            => $this->faker->randomElement($images),
        ];
    }
}
