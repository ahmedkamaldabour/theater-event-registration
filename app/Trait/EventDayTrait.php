<?php

namespace App\Trait;

use App\Models\Date;
use App\Models\EventDay;
use App\Models\Movie;
use App\Models\ShowTime;
use function date;

trait EventDayTrait
{

    public function allEventDaysGroupByMovieName()
    {
        return EventDay::with('movie', 'showtime', 'date')
            ->orderBy('id', 'desc')
            ->get()->groupBy('movie.name')->flatten(1);
    }

    public function getCreateAndEditViewData($event_day = null)
    {
        $movies = Movie::get();
        $dates = Date::where('date', '>=', date('Y-m-d'))->get();
        $showtimes = ShowTime::get();
        return compact('event_day','movies', 'showtimes', 'dates');
    }

    public function checkDateAndShowTimeExists($data)
    {
        return EventDay::where('date_id', $data['date_id'])
            ->where('show_time_id', $data['show_time_id'])
            ->exists();
    }
}
