<?php

namespace App\Models\RoomsModels;

use Illuminate\Database\Eloquent\Model;

class StandardRoom extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'capacity',
        'image_path',
        'is_available',
    ];
}
