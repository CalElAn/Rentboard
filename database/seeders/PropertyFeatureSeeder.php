<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_feature')->insert([
            ['property_feature_id' => '1', 'name' => 'Self contained'],
            ['property_feature_id' => '2', 'name' => 'Porch / Balcony'],
            ['property_feature_id' => '3', 'name' => 'Kitchen'],
            ['property_feature_id' => '4', 'name' => 'Dining room'],
            ['property_feature_id' => '5', 'name' => 'Living room'],
            ['property_feature_id' => '6', 'name' => 'Furnished'],
            ['property_feature_id' => '7', 'name' => 'Walled'],
            ['property_feature_id' => '8', 'name' => 'Number of bedrooms'],
            ['property_feature_id' => '9', 'name' => 'Number of washrooms'],
        ]);
    }
}
