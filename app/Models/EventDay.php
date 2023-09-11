<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'show_time_id',
        'date_id',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function showtime()
    {
        return $this->belongsTo(ShowTime::class, 'show_time_id', 'id');
    }

    public function date()
    {
        return $this->belongsTo(Date::class, 'date_id', 'id');
    }

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }
}
