<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;

//    protected $table = 'show_times';

    protected $fillable = [
        'start_time',
        'end_time',
    ];

    public function eventDays()
    {
        return $this->hasMany(EventDay::class);
    }

    // accessor for start_time attribute to return time in 12-hour format with AM/PM
    public function getStartTimeAttribute($value)
    {
        return date('g:i A', strtotime($value));
    }

    // accessor for end_time attribute to return time in 12-hour format with AM/PM

    public function getEndTimeAttribute($value)
    {
        return date('g:i A', strtotime($value));
    }
}

