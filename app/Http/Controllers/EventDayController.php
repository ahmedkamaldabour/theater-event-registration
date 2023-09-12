<?php

namespace App\Http\Controllers;

use App\Http\Requests\eventDay\StoreEventDayRequest;
use App\Http\Requests\eventDay\UpdateEventDayRequest;
use App\Models\EventDay;
use App\Trait\EventDayTrait;

class EventDayController extends Controller
{
    use EventDayTrait;

    public function index()
    {
        $event_days = $this->allEventDaysGroupByMovieName();
        return view('pages.event-days.index', compact('event_days'));
    }

    public function create()
    {
        return view('pages.event-days.create', $this->getCreateAndEditViewData());
    }

    public function store(StoreEventDayRequest $request)
    {
        $data = $request->validated();
        if ($this->checkDateAndShowTimeExists($data)) {
            return redirect()->route('event-days.create')->with('error', 'Event day Token!')->withInput();
        }
        EventDay::create($data);
        return redirect()->route('event-days.index')->with('success', 'Event day created!');
    }

    public function edit(EventDay $event_day)
    {
        return view('pages.event-days.edit', $this->getCreateAndEditViewData($event_day));
    }

    public function update(UpdateEventDayRequest $request, EventDay $event_day)
    {
        $data = $request->validated();
        if ($this->checkDateAndShowTimeExists($data)) {
            return redirect()->route('event-days.edit', $event_day)->with('error', 'Event day Token!')->withInput();
        }
        $event_day->update($data);
        return redirect()->route('event-days.index')->with('success', 'Event day updated!');
    }

    public function destroy(EventDay $event_day)
    {
        $event_day->attendees()->delete();
        $event_day->delete();
        return redirect()->route('event-days.index')->with('success', 'Event day deleted!');
    }
}
