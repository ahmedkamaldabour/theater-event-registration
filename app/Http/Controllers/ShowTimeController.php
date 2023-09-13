<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowTime\ShowTimeRequest;
use App\Models\Date;
use App\Models\EventDay;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Rules\ValShowTimes;
use Illuminate\Http\Request;
use function response;

class ShowTimeController extends Controller
{
    public function index()
    {
        $show_times = ShowTime::get();
        return view('pages.show_times.index', compact('show_times'));
    }

    public function create()
    {
        return view('pages.show_times.create');
    }

    public function store(ShowTimeRequest $request)
    {
        ShowTime::create($request->validated());
        return redirect()->route('showTimes.index')
            ->with('success', 'Show Time created successfully.');
    }


    public function edit(ShowTime $showTime)
    {
        return view('pages.show_times.edit', compact('showTime'));
    }

    public function update(ShowTimeRequest $request, ShowTime $showTime)
    {
        $showTime->update($request->validated());
        return redirect()->route('showTimes.index')
            ->with('success', 'Show Time updated successfully');
    }

    public function destroy(ShowTime $showTime)
    {
        $showTime->delete();
        return redirect()->route('showTimes.index')
            ->with('success', 'Show Time deleted successfully');
    }


    public function freeShowTimeForSelectedData(Date $date)
    {
        $show_times = ShowTime::whereNotIn('id', $date->eventDays->pluck('show_time_id'))->get();
        return response()->json($show_times);
    }

    public function showTimeForSelectedDate(Date $date, Movie $movie)
    {
        // select all show times for selected date and movie in event days table
        $show_times_id = EventDay::where('date_id', $date->id)->where('movie_id', $movie->id)->get('show_time_id');
        $show_times = ShowTime::whereIn('id', $show_times_id)->get();
        return response()->json($show_times);
    }

}
