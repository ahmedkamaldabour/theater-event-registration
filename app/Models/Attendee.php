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
        'event_id',
    ];

    public function eventDay()
    {
        return $this->belongsTo(EventDay::class);
    }
}
