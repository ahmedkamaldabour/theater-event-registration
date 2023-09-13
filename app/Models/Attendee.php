<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_day_id',
    ];

    public function eventDay()
    {
        return $this->belongsTo(EventDay::class, 'event_day_id', 'id');
    }

    // hasManyThrough relationship between Attendee and Date
    public function date()
    {
        return $this->hasManyThrough(Date::class, EventDay::class, 'id', 'id', 'event_day_id', 'date_id');
    }

    // hasManyThrough relationship between Attendee and movie
    public function movie()
    {
        return $this->hasManyThrough(Movie::class, EventDay::class, 'id', 'id', 'event_day_id', 'movie_id');
    }

    // hasManyThrough relationship between Attendee and Showtime
    public function showtime()
    {
        return $this->hasManyThrough(ShowTime::class, EventDay::class, 'id', 'id', 'event_day_id', 'show_time_id');
    }
}


