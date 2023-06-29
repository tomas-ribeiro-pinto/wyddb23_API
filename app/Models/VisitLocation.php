<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitLocation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description_en',
        'description_pt', 'address_line1', 'address_line2', 'picture'];
}
