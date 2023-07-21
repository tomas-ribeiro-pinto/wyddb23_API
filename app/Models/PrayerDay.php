<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tonysm\RichTextLaravel\Casts\AsRichTextContent;

class PrayerDay extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'prayer_days';
    protected $hidden = ['deleted_at'];

    protected $guarded = [];

    protected $casts = [
        'body_pt' => AsRichTextContent::class,
        'body_en' => AsRichTextContent::class,
        'body_es' => AsRichTextContent::class,
        'body_it' => AsRichTextContent::class,
    ];
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
