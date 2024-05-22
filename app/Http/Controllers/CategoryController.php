<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //


    function createCatgory(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string|max:100',
            ]);
            $user_id=Auth::id();
            Category::create([
                'name' => $request->input("name"),
                'user_id' => $user_id,
            ]);
            return response()->json(["status" => "success", "message" => "Category Created Successfully"],200);
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()],500);
        }
    }

    function categoryList(){
        try{
            $user_id=Auth::id();
            $categories=Category::where("user_id",$user_id)->with("user")->get();
            return $categories;
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()],500);
        }
    }

    function singleCategory(Request $request){
        try{
            $user_id=Auth::id();
            $category_id=$request->input("id");
            $category=Category::where("id",$category_id)->where("user_id",$user_id)->first();
            return $category;
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()],500);
        }
    }

    function updateCategory(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|max:100',
            ]);
            $user_id=Auth::id();
            $category_id=$request->input("id");
            Category::where("id",$category_id)->where("user_id",$user_id)->update([
                'name' => $request->input("name"),
            ]);
            return response()->json(["status" => "success", "message" => "Category Updated Successfully"],200);
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()],500);
        }
    }

    function deleteCategory(Request $request){
        try{
            $user_id=Auth::id();
            $category_id=$request->input("id");
            Category::where("id",$category_id)->where("user_id",$user_id)->delete();
            return response()->json(["status" => "success", "message" => "Category Deleted Successfully"],200);
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()],500);
        }
    }
}
