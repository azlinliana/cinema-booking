<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchMovieInput = $request->search_movie;

        $movies = $searchMovieInput ? 
            Movie::where('name_movie', 'LIKE', '%' . $searchMovieInput . '%')
                ->get()
            : Movie::all();

        return view('movie.index', compact('movies', 'searchMovieInput'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_movie'=> 'required|string|max:255',
            'genre_movie'=> 'required|string|max:255',
            'duration_movie' => 'required|integer|min:30|max:120', // In minutes
        ]);

        Movie::create([
            'name_movie'=> $request->name_movie,
            'genre_movie' => $request->genre_movie, 
            'duration_movie' => $request->duration_movie
        ]);

        return redirect()
            ->route('movie.index')
            ->with('status', 'Movie created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $movieId)
    {
        $getMovie = Movie::find($movieId);

        return view('movie.show', compact('getMovie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $movieId)
    {
        $getMovie = Movie::find($movieId);

        return view('movie.edit', compact('getMovie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $movieId)
    {
        $getMovie = Movie::find($movieId);

        $validatedMovie = $request->validate([
            'name_movie'=> 'required|string|max:255',
            'genre_movie'=> 'required',
            'duration_movie' => 'required|integer|min:1|max:500', // In minutes
        ]);

        $getMovie->fill($validatedMovie);

        $getMovie->save();

        return redirect()
            ->route('movie.index')
            ->with('status', 'Movie updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $movieId)
    {
        $getMovie = Movie::find($movieId);

        $getMovie->delete();

        return redirect()
            ->route('movie.index')
            ->with('status', 'Movie deleted!');
    }
}
