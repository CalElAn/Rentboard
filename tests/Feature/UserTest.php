<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Property;
use App\Models\PropertyFeature;
use Database\Factories\FavouritePropertyFactory;
use Database\Factories\PropertyMediaFactory;
use Database\Factories\PropertyReviewFactory;
use Database\Factories\ArticleFactory;

class UserTest extends TestCase
{
    public function test_a_user_has_properties()
    {
        //create a user with properties with features

        $articleFactory = ArticleFactory::factory()->count(2);

        $favouritePropertyFactory = FavouritePropertyFactory::factory()->count(2);

        $propertyReviewFactory = PropertyReviewFactory::factory()->count(2);

        $propertyMediaFactory = PropertyMediaFactory::factory()->count(2);

        $propertyFeatureFactory = PropertyFeature::factory()->count(2);

        $propertyFactory = Property::factory()->count(1)->has($propertyFeatureFactory, 'features')
                                                        ->has($propertyMediaFactory, 'media')
                                                        ->has($propertyReviewFactory, 'reviews');
        
        $userFactory = User::factory()->count(1)->has($favouritePropertyFactory, 'favouriteProperties')
                                                ->has($articleFactory, 'articles')
                                                ->has($propertyFactory, 'properties')->create();

        // $user = User::factory()
        //             ->count(1)
        //             ->has(
        //                 Property::factory()->count(1)->has(
        //                     PropertyFeature::factory()->count(2), 'features'
        //                                                 ), 
        //                 'properties'
        //                 )
        //             ->create();
        
        // dd($userFactory);
        //using make instead of create will not persist it

    }
}
