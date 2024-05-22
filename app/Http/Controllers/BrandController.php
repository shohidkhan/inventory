<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    //
    function createBrand(Request $request){
        try{
            $request->validate([
               "name"=>"required|string|max:100" 
            ]);
            $user_id=Auth::id();
            Brand::create([
                "name"=>$request->input("name"),
                "user_id"=>$user_id
            ]);
            return response()->json(["status"=>"success","message"=>"Brand created successfully"]);
        }catch(Exception $e){
            return response()->json(["status"=>"error","message"=>$e->getMessage()]);
        }
    }

    function brandList(){
        try{
            $user_id=Auth::id();
            $brands=Brand::with("user")->where("user_id",$user_id)->get();
            return $brands;
        }catch(Exception $e){
            return response()->json(["status"=>"error","message"=>$e->getMessage()]);
        }
    }
    function singleBrand(Request $request){
        try{
            $user_id=Auth::id();
            $brands=Brand::where("user_id",$user_id)->where("id",$request->input("id"))->first();
            return $brands;
        }catch(Exception $e){
            return response()->json(["status"=>"error","message"=>$e->getMessage()]);
        }
    }

    function updateBrand(Request $request){
        try{
            $request->validate([
                "name"=>"required|string|max:100"
            ]);
            $user_id=Auth::id();
            $brand=Brand::where("user_id",$user_id)->where("id",$request->input("id"))->first();
            $brand->update([
                "name"=>$request->input("name")
            ]);
            return response()->json(["status"=>"success","message"=>"Brand updated successfully"]);
        }catch(Exception $e){
            return response()->json(["status"=>"error","message"=>$e->getMessage()]);
        }
    }

    function deleteBrand(Request $request){
        try{
            $user_id=Auth::id();
            $brand=Brand::where("user_id",$user_id)->where("id",$request->input("id"))->first();
            $brand->delete();
            return response()->json(["status"=>"success","message"=>"Brand deleted successfully"]);
        }catch(Exception $e){
            return response()->json(["status"=>"error","message"=>$e->getMessage()]);
        }
    }
}
