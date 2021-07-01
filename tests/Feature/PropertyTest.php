<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Property;
use App\Models\User;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function homepage_shows_property_card_with_all_details()
    {
        // $this->withoutExceptionHandling();

        $property = Property::latest()->first();

        $this->get('/')
            ->assertSee($property->propertyType->type)
            ->assertSee($property->town)
            ->assertSee($property->address)
            ->assertSeeInOrder($property->features->pluck('name')->toArray())
            ->assertSee($property->reviews->average('rating'))
            ->assertSee($property->reviews->count().' reviews')
            ->assertSee($property->rent.' / month')
        ;
    }

    /** @test */
    public function a_property_can_be_created()
    {
        $input =  [
            "city" => "Voluptas ipsa repud",
            "town" => "Et elit dicta eos",
            "address" => "Sapiente quis ut et",
            "gpsLocation" => "5.6295424,-0.19005439999999998",
            "contactNumber" => "+1 (891) 437-5757",
            "email" => "cinugewiz@mailinator.com",
            "type" => "Apartment",
            "typeID" => 2,
            "checkedFeatures" => [
                0 => "Walled",
                1 => "Living room",
                2 => "Porch / Balcony",
                3 => "Dining room",
            ],
            "pickedFeatures" => "Furnished",
            "inputFeatures" => [
                "Number of bedrooms" => "9",
                "Number of washrooms" => "7",
            ],
            "description" => "Accusamus sint offic",
            "price" => "400",
            "negotiable" => true,
            "media" => [
                0 => "2021-06-27 06:22:32_1CjdL",
                1 => "2021-06-27 06:09:39_CQtAP",
                2 => "2021-06-27 06:07:09_8SBqW",
                3 => "2021-06-27 06:07:09_flbqy",
            ]
        ];

        $user = User::factory()->create();

        $this->post('/add-property', $input);

        $this->assertDatabaseHas('property', [
                                            'user_id' =>$user->id,
                                            'city' => 'Voluptas ipsa repud',
                                            'town' => 'Et elit dicta eos',
                                            'address' => 'Sapiente quis ut et',
                                            'gps_location' => '5.6295424,-0.19005439999999998',
                                            'type' => "2",
                                            'description' => "Accusamus sint offic",
                                            'rent' => "400",
                                            'is_rent_negotiable' => true,
                                            'is_advance_negotiable' => false,
                                            'contact_phone_number' => "+1 (891) 437-5757",
                                            'contact_email' => "cinugewiz@mailinator.com",
                                            'is_property_available' => true,
                                        ]);
    }
}
