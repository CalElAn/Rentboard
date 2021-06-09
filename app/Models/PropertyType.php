<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $table = 'property_type';

    protected $primaryKey = 'property_type_id';

    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'PropertyType_PropertyFeature_join', 'property_type_id', 'property_type_id');
    }
}
