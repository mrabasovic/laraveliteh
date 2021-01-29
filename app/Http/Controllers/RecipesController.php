<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function view($id){

        $pieces = explode("/", url()->current());
        $recipe= Recipe::findOrFail($pieces[count($pieces)-1]);
        return view('recipe',['recipe'=>$recipe]);

    }
    public function create(Request $request){
        $recipe= new Recipe();
        $recipe->name=$request->name;
        $recipe->description=$request->description;
        $recipe->time=$request->time;
        $recipe->author=$request->author;
        $recipe->url=$request->url;
        $recipe->category_id=$request->category_id;
        $recipe->save();
        return redirect('/'.$request->category_id.'/'.$request->id);
    }
    public function getAll(){

        return response()->json(Recipe::all(),200);
    }
    public function getById($id){
        $recipe=Recipe::find($id);
        if(is_null($recipe)){
            return response()->json(["message"=>"No recipe like this!"],404);
        }
        return response()->json($recipe,200);
    }
    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>'required|min:2',
            'description'=>'required|min:2',
            'time'=>'required|min:2',
            'author'=>'required|min:2',
            'url'=>'required|min:2',
            'category_id'=>'required',

        ]);

        if ($validator->fails()) {
            return response()->json(["message"=>"All fields are required"],400);
        }
        $recipe= Recipe::create($request->all());
        return response()->json($recipe, 201);
    }
    public function delete(Request $request, $id){
        $recipe=Recipe::find($id);

        if(is_null($recipe)){
            return response()->json(["message"=>"No recipe like this!"],404);
        }
        $recipe->delete();
        return response()->json(null,204);
    }
}
