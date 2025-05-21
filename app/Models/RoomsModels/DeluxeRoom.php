<?php

namespace App\Models\RoomsModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeluxeRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'capacity',
        'image_path',
        'is_available',
    ];
}
