<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
    ];

    public function eventDays()
    {
        return $this->hasMany(EventDay::class);
    }

    // function to get the day for the date

    public function getDay()
    {
        return date('l', strtotime($this->date));
    }
}
