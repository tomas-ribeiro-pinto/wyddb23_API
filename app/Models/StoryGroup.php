<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoryGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function stories()
    {
        return $this->hasMany(Story::class)->orderBy('created_at');
    }
}
