<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //

    public function createCustomer(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|min:11',
            ]);

            Customer::create([
                'name' => $request->input("name"),
                'email' => $request->input("email"),
                'mobile' => $request->input("mobile"),
                "user_id"=>Auth::id(),
            ]);

            return response()->json(["status" => "success", "message" => "Customer Created Successfully"]);

        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }


    }

    public function customerList(){
        try{
            $user_id=Auth::id();

            $customer=Customer::where("user_id",$user_id)->with('user')->get();
            return $customer;
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    public function singleCustomer(Request $request){
        try{
            $id=$request->input("id");
            $user_id=Auth::id();
            $customer=Customer::where("user_id",$user_id)->where("id",$id)->with('user')->first();
            return $customer;
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
    public function updateCustomer(Request $request){
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required',
            ]);
            $user_id=Auth::id();
            $id=$request->input("id");
            $customer=Customer::where("user_id",$user_id)->where("id",$id)->update([
                'name' => $request->input("name"),
                'email' => $request->input("email"),
                'mobile' => $request->input("mobile"),
            ]);
            return response()->json(["status" => "success", "message" => "Customer Updated Successfully"]);
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
    public function deleteCustomer(Request $request){
        try{
            $user_id=Auth::id();
            $id=$request->input("id");
            $customer=Customer::where("user_id",$user_id)->where("id",$id)->delete();
            return response()->json(["status" => "success", "message" => "Customer Deleted Successfully"]);
        }catch(Exception $e){
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
}
