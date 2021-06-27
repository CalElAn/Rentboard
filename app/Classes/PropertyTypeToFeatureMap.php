<?php

namespace App\Classes;

class PropertyTypeToFeatureMap
{
    static $propertyTypeArray = [
        ['property_type_id' => '1', 'type' => 'Chamber and hall'],
        ['property_type_id' => '2', 'type' => 'Apartment'],
        ['property_type_id' => '3', 'type' => 'Studio apartment'],
        ['property_type_id' => '4', 'type' => 'Service apartment'],
        ['property_type_id' => '5', 'type' => 'House'],
        ['property_type_id' => '6', 'type' => 'Single room'],
        ['property_type_id' => '7', 'type' => 'Bed'],
    ];

    static $propertyFeatureArray = [
        ['property_feature_id' => '1', 'name' => 'Number of bedrooms', 'input_type' => 'number'],
        ['property_feature_id' => '2', 'name' => 'Number of washrooms', 'input_type' => 'number'],
        ['property_feature_id' => '3', 'name' => 'Self contained', 'input_type' => 'checkbox'],
        ['property_feature_id' => '4', 'name' => 'Porch', 'input_type' => 'checkbox'],
        ['property_feature_id' => '5', 'name' => 'Kitchen', 'input_type' => 'checkbox'],
        ['property_feature_id' => '6', 'name' => 'Dining room', 'input_type' => 'checkbox'],
        ['property_feature_id' => '7', 'name' => 'Living room', 'input_type' => 'checkbox'],
        ['property_feature_id' => '8', 'name' => 'Furnished', 'input_type' => 'radio'],
        ['property_feature_id' => '9', 'name' => 'Semi-furnished', 'input_type' => 'radio'],
        ['property_feature_id' => '10', 'name' => 'Unfurnished', 'input_type' => 'radio'],
        ['property_feature_id' => '11', 'name' => 'Walled', 'input_type' => 'checkbox'],
    ];

    static $propertyTypeToFeatureArray = [
        'Chamber and hall' => [
            'Self contained',
            'Porch',
            'Kitchen',
            'Furnished',
            'Semi-furnished',
            'Unfurnished',
            'Walled',
        ],
        'Apartment' => [
            'Number of washrooms',
            'Number of bedrooms',
            'Self contained',
            'Porch',
            'Kitchen',
            'Dining room',
            'Living room',
            'Furnished',
            'Semi-furnished',
            'Unfurnished',
            'Walled',
        ],
        'Studio apartment' => [
            'Porch',
            'Kitchen',
            'Dining room',
            'Living room',
            'Furnished',
            'Semi-furnished',
            'Unfurnished',
            'Walled',
        ],
        'Service apartment' => [
            'Number of bedrooms',
            'Number of washrooms',
            'Porch',
            'Kitchen',
            'Dining room',
            'Living room',
            'Walled',
        ],
        'House' => [
            'Number of bedrooms',
            'Number of washrooms',
            'Porch',
            'Kitchen',
            'Dining room',
            'Living room',
            'Furnished',
            'Semi-furnished',
            'Unfurnished',
            'Walled',
        ],
        'Single room' => [
            'Self contained',
            'Porch',
            'Furnished',
            'Semi-furnished',
            'Unfurnished',
            'Walled',
        ],
        'Bed' => [
            //*Add option for campus?
        ],
    ];

    public function mapPropertyTypeToFeature()
    {
        $propertyTypeToFeatureMapArray = [];

        //first get the type from the PropertyTypetoFeatureArray
        foreach ($this::$propertyTypeToFeatureArray as $firstKey => $firstValue)
        {
            //second get the found type's ID from the propertyArray
            foreach ($this::$propertyTypeArray as $secondKey => $secondValue)
            {
                if ($firstKey === $secondValue['type'])
                {
                    //third get the associated feature from the propertyTypetoFeatureArray
                    foreach ($firstValue as $firstFirstKey => $firstFirstValue)
                    {
                        //fourth get the found feature's ID from the propertyFeatureArray
                        foreach ($this::$propertyFeatureArray as $thirdKey => $thirdValue)
                        {
                            if ($thirdValue['name'] === $firstFirstValue)
                            {
                                //*to test output, comment after testing
                                // $propertyTypeToFeatureMapArray[] = ['property_type_id' => $secondValue['type'],
                                //                                     'property_feature_id' => $thirdValue['name']];

                                //*intended output, uncoment after testing
                                $propertyTypeToFeatureMapArray[] = ['property_type_id' => $secondValue['property_type_id'],
                                                                    'property_feature_id' => $thirdValue['property_feature_id']];
                            }
                        }
                    }
                }
            }
        }

        return $propertyTypeToFeatureMapArray;
    }
}
