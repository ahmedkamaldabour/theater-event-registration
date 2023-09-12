<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowTime\ShowTimeRequest;
use App\Models\ShowTime;
use App\Rules\ValShowTimes;
use Illuminate\Http\Request;

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


}
