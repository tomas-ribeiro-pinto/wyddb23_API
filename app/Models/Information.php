<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Information extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'body_pt' => AsRichTextContent::class,
        'body_en' => AsRichTextContent::class,
        'body_es' => AsRichTextContent::class,
        'body_it' => AsRichTextContent::class,
    ];
}
