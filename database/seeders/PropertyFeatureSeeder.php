<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Classes\PropertyTypeToFeatureMap;

class PropertyFeatureSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_feature')->insert(PropertyTypeToFeatureMap::$propertyFeatureArray);
    }
}
