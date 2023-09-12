<?php

namespace App\Http\Controllers;

use App\Http\Requests\attendee\StoreAttendeeRequest;
use App\Models\Attendee;
use App\Models\Date;
use App\Models\EventDay;

class AttendeeController extends Controller
{
    public function create()
    {
        $date = Date::where('date', '>=', now()->format('Y-m-d'))->get();
        $event_days = EventDay::whereIn('date_id', $date->pluck('id'))->get();
        return view('attendees.create', compact('event_days'));
    }

    public function store(StoreAttendeeRequest $request)
    {
        $attendee = Attendee::where('email', $request->email)->where('event_day_id', $request->event_day_id)->first();
        if ($attendee && ($attendee->created_at->addDays(7) > now())) {
            return redirect()->route('resister')->with('error', 'You have already registered for this event!');
        }
        return redirect()->route('resister')->with('success', 'Resister success!');
    }
}
