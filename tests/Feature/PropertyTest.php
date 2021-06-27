<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Property;


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
            "price" => "4",
            "negotiable" => true,
            "media" => [
                0 => "2021-06-27 06:22:32_1CjdL",
                1 => "2021-06-27 06:09:39_CQtAP",
                2 => "2021-06-27 06:07:09_8SBqW",
                3 => "2021-06-27 06:07:09_flbqy",
            ]
        ];

        $this->post('/add-property', $input);

        $this->assertDatabaseHas('property', [
                                            'email' => 'sally@example.com',
                                            ]);
    }
}
