<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    public function entries()
    {
        return $this->hasMany(EntryDay::class)->orderBy('start_time');
    }

    public function prayers()
    {
        return $this->hasMany(PrayerDay::class)->orderBy('order_index');
    }
}
