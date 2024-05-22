<?php

namespace App\Http\Controllers;

use App\Mail\SENDOTP;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller {
    //

    public function userRegistration(Request $request) {
        try {
            $total_user = User::count();

            $request->validate([
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'mobile' => 'required|min:11|regex:/(0)[0-9]/|not_regex:/[a-z]/',
                'password' => 'required|min:3',
            ]);
            if ($total_user < 4) {
                User::create([
                    "firstName" => $request->input("firstName"),
                    "lastName" => $request->input("lastName"),
                    "email" => $request->input("email"),
                    "mobile" => $request->input("mobile"),
                    "password" => Hash::make($request->input("password")),
                ]);
                return response()->json(["status" => "success", "message" => "User Registration Successful"], 200);
            } else {
                return response()->json(["status" => "error", "message" => "User Registration reached to limit"], 200);
            }

        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }
    }

    function userLogin(Request $request) {
        try {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where("email", $request->input("email"))->first();

            if (!$user || !Hash::check($request->input("password"), $user->password)) {
                return response()->json(["status" => "error", "message" => "Invalid Credentials"], 200);
            }

            $token = $user->createToken("authToken")->plainTextToken;
            return response()->json(["status" => "success", "message" => "Login Successful", "token" => $token], 200);

        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }
    }

    function userProfileDetail(Request $request) {
        return Auth::user();
    }

    function updateProfile(Request $request) {
        try {
            $request->validate([
                "firstName" => "required|string|max:50",
                "lastName" => "required|string|max:50",
                "mobile" => "required|min:11|regex:/(0)[0-9]/|not_regex:/[a-z]/",
            ]);

            User::where("id", "=", Auth::id())->update([
                "firstName" => $request->input("firstName"),
                "lastName" => $request->input("lastName"),
                "mobile" => $request->input("mobile"),
                "password" => Hash::make($request->input("password")),
            ]);

            return response()->json(["status" => "success", "message" => "Profile Updated Successfully"], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }

    }

    function sendOtp(Request $request) {
        try {
            $request->validate([
                "email" => "required|email|max:50|string",
            ]);
            $email = $request->input("email");
            $otp = rand(1000, 9999);
            $count = User::where("email", "=", $email)->count();
            if ($count === 1) {
                Mail::to($email)->send(new SENDOTP($otp));
                User::where("email", "=", $email)->update([
                    "otp" => $otp,
                ]);
                return response()->json(["status" => "success", "message" => "Otp Sent Successfully"], 200);
            } else {
                return response()->json(["status" => "error", "message" => "Email Not Found"], 200);
            }
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }
    }

    function verifyOtp(Request $request) {
        try {
            $request->validate([
                "email" => "required|email|max:50|string",
                "otp" => "required|min:4",
            ]);
            $email = $request->input("email");
            $otp = $request->input("otp");
            $user = User::where("email", "=", $email)->where("otp", "=", $otp)->first();
            if (!$user) {
                return response()->json(["status" => "error", "message" => "Invalid Otp"], 200);
            }

            User::where("email", "=", $email)->update([
                "otp" => 0,
            ]);

            $token = $user->createToken("authToken")->plainTextToken;
            return response()->json(["status" => "success", "message" => "Otp Verified Successfully", "token" => $token], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }
    }

    function resetPassword(Request $request) {
        try {
            $request->validate([
                "password" => "required|min:3",
            ]);
            $id = Auth::id();
            User::where("id", $id)->update([
                "password" => Hash::make($request->input("password")),
            ]);

            return response()->json(["status" => "success", "message" => "Password Reset Successfully"], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "success", "message" => $e->getMessage()], 200);
        }
    }
    function logout(Request $request) {
        try {
            $request->user()->tokens()->delete();
            return response()->json(["status" => "success", "message" => "Logout Successful"], 200);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }
    }
}
