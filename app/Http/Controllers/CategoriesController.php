<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function all(){
        $categories=Category::all();
        $recipes= Recipe::all();
        foreach ($categories as $category){
            $add=[];
            foreach ($recipes as $recipe){
                if($recipe->category_id==$category->id){
                    $add[count($add)]=$recipe;
                }
            }
            $category->recipes=$add;
        }
        return view('all', [
            'categories'=>$categories
        ]);

    }
    public function view($id){
        $category= Category::findOrFail($id);
        $recipes= Recipe::all();
        $add=[];
        foreach ($recipes as $recipe) {
            if ($recipe->category_id == $id) {
                $add[count($add)] = $recipe;
            }
        }
        $category->recipes=$add;
        return view('category',['category'=>$category]);

    }
    public function create(Request $request){
        $category= new Category();
        $category->name=$request->name;
        $category->save();
        return redirect('/'.$request->id);
    }
    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["message"=>"Name is required"],400);
        }
        $category= Category::create($request->all());
        return response()->json($category, 201);
    }
    public function delete(Request $request, $id){
        $category=Category::find($id);
        $recipes=Recipe::all();
        if(is_null($category)){
            return response()->json(["message"=>"No category like this!"],404);
        }
        foreach ($recipes as $recipe) {
            if ($recipe->categgory_id == $id){
                $recipe->delete();
            }
        }
        $category->delete();
        return response()->json(null,204);
    }
    public function getAll(){
        $categories=Category::all();
        $recipes=Recipe::all();
        foreach ($categories as $category) {
            $add=[];
            foreach ($recipes as $recipe) {
                if ($recipe->category_id == $category->id){
                    $add[count($add)]=$recipe;
                }
            }
            $category->recipes=$add;
        }

        return response()->json($categories,200);
    }
    public function getById($id){
        $category=Category::find($id);
        $recipes=Recipe::all();
        if(is_null($category)){
            return response()->json(["message"=>"No category like this!"],404);
        }
        $add=[];
        foreach ($recipes as $recipe) {
            if ($recipe->category_id == $id){
                $add[count($add)]=$recipe;
            }
        }
        $category->recipes=$add;
        return response()->json($category,200);
    }
}
