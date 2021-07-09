<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyMedia extends Model
{
    use HasFactory;

    protected $table = 'property_media';

    protected $primaryKey = 'property_media_id';

    protected $guarded = [];
}
