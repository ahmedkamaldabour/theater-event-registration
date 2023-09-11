<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\EventDay;
use App\Models\Movie;
use App\Models\ShowTime;

class EventDayController extends Controller
{
    public function index()
    {
        $event_days = EventDay::with('movie', 'showtime', 'date')
            ->orderBy('id', 'desc')
            ->get()->groupBy('movie.name')->flatten(1);
        return view('pages.event-days.index', compact('event_days'));
    }

    public function create()
    {
        $movies = Movie::orderBy('name', 'asc')->get();
        $dates = Date::orderBy('date', 'asc')->where('date', '>=', date('Y-m-d'))->get();
        $showtimes = ShowTime::orderBy('start_time', 'asc')->get();

        return view('pages.event-days.create', compact('movies', 'showtimes', 'dates'));
    }

    public function store()
    {
        $data = request()->validate([
            'movie_id' => 'required|exists:movies,id',
            'date_id' => 'required|exists:dates,id',
            'show_time_id' => 'required|exists:show_times,id',
        ]);
        if (EventDay::where('date_id', $data['date_id'])
            ->where('show_time_id', $data['show_time_id'])
            ->exists()) {
            return redirect()->route('event-days.create')->with('error', 'Event day Token!')->withInput();
        }
        EventDay::create($data);
        return redirect()->route('event-days.index')->with('success', 'Event day created!');
    }

    public function edit(EventDay $event_day)
    {
        $movies = Movie::orderBy('name', 'asc')->get();
        $dates = Date::orderBy('date', 'asc')->where('date', '>=', date('Y-m-d'))->get();
        $showtimes = ShowTime::orderBy('start_time', 'asc')->get();
        return view('pages.event-days.edit', compact('event_day', 'movies', 'showtimes', 'dates'));
    }

    public function update(EventDay $event_day)
    {
        $data = request()->validate([
            'movie_id' => 'required|exists:movies,id'.$event_day->id,
            'date_id' => 'required|exists:dates,id'.$event_day->id,
            'show_time_id' => 'required|exists:show_times,id'.$event_day->id,
        ]);
        if (EventDay::where('date_id', $data['date_id'])
            ->where('show_time_id', $data['show_time_id'])
            ->exists()) {
            return redirect()->route('event-days.edit', $event_day)->with('error', 'Event day Token!')->withInput();
        }
        $event_day->update($data);
        return redirect()->route('event-days.index')->with('success', 'Event day updated!');
    }

    public function destroy(EventDay $event_day)
    {
        $event_day->delete();
        return redirect()->route('event-days.index')->with('success', 'Event day deleted!');
    }
}
