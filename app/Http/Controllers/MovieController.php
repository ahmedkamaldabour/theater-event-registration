<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::get();
        return view('pages.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('pages.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:movies,name',
        ]);
        Movie::create($request->all());

        return redirect()->route('movies.index')
            ->with('success', 'Movie created successfully.');
    }

    public function edit(Movie $movie)
    {
        return view('pages.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required|unique:movies,name,'.$movie->id,
        ]);

        $movie->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('movies.index')
            ->with('success', 'Movie updated successfully');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully');
    }
}
