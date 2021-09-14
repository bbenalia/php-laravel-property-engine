<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            "title"            => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
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
            "room"             => $this->faker->numberBetween($min = 1, $max = 7),
            "bath"             => $this->faker->numberBetween($min = 1, $max = 4),
            "size"             => $this->faker->numberBetween($min = 40, $max = 250),
            "price"            => $this->faker->numberBetween($min = 100000, $max = 500000),
            "pet"              => $this->faker->boolean(),
            "garden"           => $this->faker->boolean(),
            "air_conditioning" => $this->faker->boolean(),
            "swimming_pool"    => $this->faker->boolean(),
            "terrace"          => $this->faker->boolean()
        ];
    }
}
