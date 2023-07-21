<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;

class NewFatimaGuide extends Model
{
    use HasFactory, SoftDeletes;

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