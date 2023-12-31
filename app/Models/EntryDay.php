<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EntryDay extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'entry_days';
    protected $hidden = ['deleted_at'];
    protected $guarded = [];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function getTranslatedTitleAttribute(string $locale)
    {
        if($locale == 'en')
            $title = $this->title_en;
        else if($locale == 'pt')
            $title = $this->title_pt;
        else
            $title = $this->title_en;


        return $title;
    }
}
