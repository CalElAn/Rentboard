<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'property';

    protected $primaryKey = 'property_id';

    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'Property_PropertyFeature_join', 'property_id', 'property_feature_id', 'property_id', 'property_feature_id');
    }

    public function media()
    {
        return $this->hasMany(PropertyMedia::class, 'property_id', 'property_id');
    }

    public function reviews()
    {
        return $this->hasMany(PropertyReview::class, 'property_id', 'property_id');
    }

    public function propertyType() //changed name from 'type' cos it conflicted with a property on the model
    {
        return $this->belongsTo(PropertyType::class, 'type', 'property_type_id');
    }
}
