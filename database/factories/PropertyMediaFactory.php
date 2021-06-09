<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\PropertyMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyMedia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property_id' => Property::factory(),
            'type' => 'picture', //**should be a MIME or extension, generste from picture automatically, add other fields for more characteristics like size, etc
            'path' => 'https://picsum.photos/200/300',
        ];
    }
}
