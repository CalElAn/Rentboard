<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypePropertyFeatureJoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('PropertyType_PropertyFeature_join')->insert([
            ['property_type_id' => 1, 'property_feature_id' => 1],
            ['property_type_id' => 1, 'property_feature_id' => 2],
            ['property_type_id' => 1, 'property_feature_id' => 3],
            ['property_type_id' => 1, 'property_feature_id' => 7],
            ['property_type_id' => 2, 'property_feature_id' => 6],
            ['property_type_id' => 2, 'property_feature_id' => 8],
            ['property_type_id' => 2, 'property_feature_id' => 9],
            ['property_type_id' => 2, 'property_feature_id' => 4],
            ['property_type_id' => 2, 'property_feature_id' => 5],
            ['property_type_id' => 2, 'property_feature_id' => 2],
            ['property_type_id' => 2, 'property_feature_id' => 7],
            ['property_type_id' => 3, 'property_feature_id' => 6],
            ['property_type_id' => 3, 'property_feature_id' => 8],
            ['property_type_id' => 3, 'property_feature_id' => 9],
            ['property_type_id' => 3, 'property_feature_id' => 4],
            ['property_type_id' => 3, 'property_feature_id' => 5],
            ['property_type_id' => 3, 'property_feature_id' => 2],
            ['property_type_id' => 3, 'property_feature_id' => 7],
            ['property_type_id' => 4, 'property_feature_id' => 1],
            ['property_type_id' => 4, 'property_feature_id' => 2],
            ['property_type_id' => 4, 'property_feature_id' => 3],
            ['property_type_id' => 4, 'property_feature_id' => 7],
        ]);
    }
}
