<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;

class AccommodationLocation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'description_pt' => AsRichTextContent::class,
        'description_en' => AsRichTextContent::class,
        'description_es' => AsRichTextContent::class,
        'description_it' => AsRichTextContent::class,
    ];
}
