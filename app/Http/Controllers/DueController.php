<?php

namespace App\Http\Controllers;

use App\Models\Due;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DueController extends Controller {
    //

    function dueList() {
        try {
            $user_id = Auth::id();

            $due_lists = Due::where("user_id", $user_id)->with("customer", "invoice")->get();
            return $due_lists;
        } catch (Exception $e) {
            return response()->json(["error" => false, "message" => $e->getMessage()]);
        }
    }

    function singleDue(Request $request) {
        try {
            $user_id = Auth::id();
            $due = Due::where("user_id", $user_id)->where("id", $request->input("id"))->with("customer", "invoice")->first();
            return $due;
        } catch (Exception $e) {
            return response()->json(["error" => false, "message" => $e->getMessage()]);
        }
    }

    function updateDue(Request $request) {
        try {
            $user_id = Auth::id();
            $due = Due::where("user_id", $user_id)->where("id", $request->input("id"))->with("customer", "invoice")->first();
            $total_paid = $due->total_paid + $request->input("currentPay");
            $total_due = $due->total_due - $request->input("currentPay");
            Due::where("user_id", $user_id)->where("id", $request->input("id"))->update([
                "total_due" => $total_due,
                "total_paid" => $total_paid,
            ]);
            return response()->json(["status" => "success", "message" => "Due Updated successfully"], 200);
        } catch (Exception $e) {
            return response()->json(["error" => false, "message" => $e->getMessage()]);
        }
    }
}
