<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationLocation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'contact', 'description_en',
            'description_pt', 'address_line1', 'address_line2', 'picture'];
}
