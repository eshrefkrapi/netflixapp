<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Mockery\Mock;

class MovieController extends Controller
{

    public function store(StoreMovieRequest $request){
        
        $movie = new Movie();

        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->category_id = $request->category_id;
        $movie->file = $request->file;
        $movie->thumbnail = $request->thumbnail;
        $movie->rating = $request->name;
        $movie->serie_id = $request->serie_id;
        $movie->date = $request->date;

        
        $movie->save();

        return response()->json([
            'message' => 'Movie stored successfully'
        ]);
    }

    public function index(){
        $movies = Movie::all();

        if($movies->count() >= 1)
        {
        return response()->json($movies,200);
    }else{
        return response()->json([
            'message' => 'No movies found!'
        ],200);
    }
    }

    public function show($id){
        $movies = Movie::findOrFail($id);

        return response()->json($movies);
    }



    public function destroy($id){

        $movie =  Movie::findOrFail($id);

        $movie->delete();

        if($movie->count() >= 1)
        {
        return response()->json([
            'message' => 'Movie deleted successfully!'
        ],200);
    }else{
        return response()->json([
            'message' => 'Last movie deleted successfully!'
        ],200);
    }}

    public function update(UpdateMovieRequest $request, $id){

    $movie = Movie::findOrFail($id);

    $movie->name = $request->name;
    $movie->description = $request->description;
    $movie->category_id = $request->category_id;
    $movie->file = $request->file;
    $movie->thumbnail = $request->thumbnail;
    $movie->rating = $request->rating;
    $movie->serie_id = $request->serie_id;
    $movie->date = $request->date;

    $movie->update();
    
    return response()->json(
        [
            'message' => 'Movie updated successfully!'
        ],200);
    }
    
}
