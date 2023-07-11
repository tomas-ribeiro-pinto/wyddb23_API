<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function body(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value->body_pt->render(),
        );
    }
}
