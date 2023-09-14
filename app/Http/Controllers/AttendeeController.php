<?php

namespace App\Http\Controllers;

use App\Http\Requests\attendee\StoreAttendeeRequest;
use App\Models\Attendee;
use App\Models\Date;
use App\Models\EventDay;
use App\Models\Movie;
use function now;
use function redirect;

class AttendeeController extends Controller
{
    public function index()
    {
        $reservations = Attendee::with('movie' , 'date' , 'showtime'
        )->latest()->paginate();
        return view('pages.attendees.index', compact('reservations'));
    }
    public function create()
    {
        $date = Date::where('date', '>=', now()->format('Y-m-d'))->get();
        $event_days = EventDay::whereIn('date_id', $date->pluck('id'))->get();
        $movies = Movie::get();
        return view('attendees.create', compact('event_days', 'movies'));
    }
    public function store(StoreAttendeeRequest $request)
    {
        $this->checkUserResisterBeforeSevenDays($request->email, $request->event_day_id);
        // Check StoreAttendeeRequest Logic
        Attendee::create($request->validated());
        if (!auth()->user())
        {
            return redirect()->back()->with('success', 'Resister success!');
        }
        return redirect()->route('resister.index')->with('success', 'Resister success!');
    }
    public function edit(Attendee $attendee)
    {
        $date = Date::where('date', '>=', now()->format('Y-m-d'))->get();
        $event_days = EventDay::whereIn('date_id', $date->pluck('id'))->get();
        return view('pages.attendees.edit', compact('attendee', 'event_days'));
    }
    public function update(StoreAttendeeRequest $request, Attendee $attendee)
    {
        $attendee->update($request->validated());
        return redirect()->route('resister.index')->with('success', 'Update success!');
    }
    public function destroy(Attendee $attendee)
    {
        $attendee->delete();
        return redirect()->route('resister.create')->with('success', 'Delete success!');
    }
    private function checkUserResisterBeforeSevenDays($email, $event_day_id)
    {
        $attendee = Attendee::where('email', $email)->where('event_day_id', $event_day_id)->first();
        if ($attendee && ($attendee->created_at->addDays(7) > now())) {
            return redirect()->route('resister.create')->with('error', 'You have already registered for this event!');
        }
        return true;
    }
}
