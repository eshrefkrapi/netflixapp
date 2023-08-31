<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function store(StoreCategoryRequest $request){
        
        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        
        $category->save();
        return response()->json($category);
    }

    public function show($id){
        $categories =  Category::findOrFail($id);
        return response()->json($categories);

    }

    public function destroy($id){

        $category =  Category::findOrFail($id);

        $category->delete();

        return response()->json([
            'message' => 'User with the ID you entered deleted successfully'
        ]);

    }

    public function update(UpdateCategoryRequest $request, $id){
        
        $category =  Category::findOrFail($id);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->update();

        return response()->json([
            'message' => 'User updated successfully'
        ]);
    }
}
