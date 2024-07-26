<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuplierController extends Controller {
    //

    function createSuplier(Request $request) {
        try {
            $request->validate([
                "suplier_name" => "required|string",
                "suplier_email" => "required|email",
                "suplier_mobile" => "required|min:11",
                "suplier_address" => "required|string",

            ]);

            Suplier::create([
                "suplier_name" => $request->input("suplier_name"),
                "suplier_email" => $request->input("suplier_email"),
                "suplier_mobile" => $request->input("suplier_mobile"),
                "suplier_address" => $request->input("suplier_address"),
                "user_id" => Auth::id(),
            ]);
            return response()->json(["status" => "success", "message" => "Suplier Created Successfully"], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }
    }

    function suplierList() {
        try {
            $supliers = Suplier::where("user_id", Auth::id())->get();
            return $supliers;
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    function singleSuplier(Request $request) {
        try {
            $suplier = Suplier::where("id", $request->input("id"))->where("user_id", Auth::id())->first();
            return $suplier;
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    function updateSuplier(Request $request) {
        try {
            $supplier = Suplier::where("id", $request->input("id"))->where("user_id", Auth::id())->first();
            $request->validate([
                "suplier_name" => "required|string",
                "suplier_email" => "required|email|unique:supliers,suplier_email," . $supplier->id,
                "suplier_mobile" => "required|min:11",
                "suplier_address" => "required|string",
            ]);

            Suplier::where("id", $request->input("id"))->update([
                "suplier_name" => $request->input("suplier_name"),
                "suplier_email" => $request->input("suplier_email"),
                "suplier_mobile" => $request->input("suplier_mobile"),
                "suplier_address" => $request->input("suplier_address"),
            ]);
            return response()->json(["status" => "success", "message" => "Suplier Updated Successfully"], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }
    }

    function deleteSuplier(Request $request) {
        try {
            Suplier::where("id", $request->input("id"))->where("user_id", Auth::id())->delete();
            return response()->json(["status" => "success", "message" => "Suplier Deleted Successfully"]);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
}
