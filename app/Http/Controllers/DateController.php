<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Movie;
use Illuminate\Http\Request;

class DateController extends Controller
{

    public function index()
    {
        $dates = Date::orderBy('id', 'desc')->get();
        return view('pages.dates.index', compact('dates'));
    }

    public function create()
    {
        return view('pages.dates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today|unique:dates,date',
        ]);
        Date::create([
            'date' => $request->date
        ]);
        return redirect()->route('dates.index')->with('success', 'Date added successfully');
    }

    public function edit(Date $date)
    {
        return view('pages.dates.edit', compact('date'));
    }

    public function update(Request $request, Date $date)
    {
        $request->validate([
            'date' => 'required|date|after_or_equal:today|unique:dates,date,' . $date->id,
        ]);
        $date->update([
            'date' => $request->date
        ]);
        return redirect()->route('dates.index')->with('success', 'Date updated successfully');
    }

    public function destroy(Date $date)
    {
        $date->delete();
        return redirect()->route('dates.index')->with('success', 'Date deleted successfully');
    }

    public function dateForSelectedMovie(Movie $movie)
    {
        $dates = Date::whereHas('eventDays', function ($query) use ($movie) {
            $query->where('movie_id', $movie->id);
        })->get();
        return response()->json($dates);
    }


}
