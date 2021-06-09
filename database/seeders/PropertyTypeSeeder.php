<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_type')->insert([
            ['property_type_id' => '1', 'type' => 'Chamber and hall'],
            ['property_type_id' => '2', 'type' => 'Apartment'],
            ['property_type_id' => '3', 'type' => 'House'],
            ['property_type_id' => '4', 'type' => 'Single room'],
            ['property_type_id' => '5', 'type' => 'Bed'],
        ]);
    }
}
