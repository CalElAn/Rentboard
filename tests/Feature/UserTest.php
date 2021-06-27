<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Property;
use App\Models\PropertyFeature;
use App\Models\FavouriteProperty;
use App\Models\PropertyMedia;
use App\Models\PropertyReview;
use App\Models\Article;

class UserTest extends TestCase
{
    public function createAUserWithEverything()
    {
        //create a user with properties with features

        $articleFactory = Article::factory()->count(2);

        $favouritePropertyFactory = FavouriteProperty::factory()->count(2);

        $propertyReviewFactory = PropertyReview::factory()->count(2);

        $propertyMediaFactory = PropertyMedia::factory()->count(5);

        $propertyFeatureFactory = PropertyFeature::factory()->count(8);

        $propertyFactory = Property::factory()->count(1)->has($propertyFeatureFactory, 'features')
                                                        ->has($propertyMediaFactory, 'media')
                                                        ->has($propertyReviewFactory, 'reviews');
        
        $userFactory = User::factory()->count(1)->has($favouritePropertyFactory, 'favouriteProperties')
                                                ->has($articleFactory, 'articles')
                                                ->has($propertyFactory, 'properties')
                                                ->create();
        
        // dd($userFactory);
        //using make instead of create will not persist it
    }

}
