<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    use HasFactory;

    protected $table = 'property_feature';

    protected $primaryKey = 'property_feature_id';

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'Property_PropertyFeature_join', 'property_feature_id', 'property_id', 'property_feature_id', 'property_id');
    }

    public function propertyTypes()
    {
        return $this->belongsToMany(PropertyType::class, 'PropertyType_PropertyFeature_join', 'property_feature_id', 'property_feature_id');
    }
}
