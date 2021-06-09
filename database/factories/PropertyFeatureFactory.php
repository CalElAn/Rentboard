<?php

namespace Database\Factories;

use App\Models\PropertyFeature;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PropertyFeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PropertyFeature::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $propertyFeatureData = DB::table('property_feature')
            ->pluck('name', 'property_feature_id')->toArray();

        return [
            'name' => $propertyFeatureData[ array_rand($propertyFeatureData) ],
        ];
    }
}
