<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;

class SerieController extends Controller
{
    public function store(StoreSerieRequest $request){
        
        $serie = new Serie();

        $serie->name = $request->name;
        $serie->description = $request->description;
        
        $serie->save();
        return response()->json([
            'message' => 'Serie created successfully'
        ]);
    }

    public function index(){
        $series = Serie::all();

        if($series->count() >= 1)
        {
        return response()->json($series,200);
    }else{
        return response()->json([
            'message' => 'No series found!'
        ],200);
    }
    }

    public function show($id){
        $series = Serie::findOrFail($id);

        return response()->json($series);
    }



    public function destroy($id){

        $serie =  Serie::findOrFail($id);

        $serie->delete();

        if($serie->count() >= 1)
        {
        return response()->json([
            'message' => 'Serie deleted successfully!'
        ],200);
    }else{
        return response()->json([
            'message' => 'Last serie deleted successfully!'
        ],200);
    }}

    public function update(UpdateSerieRequest $request, $id){

    $serie = Serie::findOrFail($id);

    $serie->name = $request->name;
    $serie->description = $request->description;

    $serie->update();
    
    return response()->json(
        [
            'message' => 'Serie updated successfully!'
        ],200);
    }

}
