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
        Attendee::create($request->validated());
        return redirect()->route('resister')->with('success', 'Resister success!');
    }
}
