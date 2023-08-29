<?php

namespace App\Http\Controllers\API\V1;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // ! Login
    public function login(Request $request)
    {
        try {
            // * Credentials (username, email, phone)
            $credentials = $request->input('credentials');
            $input = filter_var($credentials, FILTER_VALIDATE_EMAIL)
                ? 'email'
                : (ctype_digit($credentials) ? :'username');

            // * Validate Request
            $validator = Validator::make($request->all(), [
                'credentials' => 'required',
                'password' => 'required'
            ]);

            // * Check Validation
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            // * Check if User exists
            $user = User::where($input, $credentials)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'The provided credentials do not match our records.'
                ], 404);
            }

            // * Check password match
            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Password does not match.'
                ], 401);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Successfully logged in',
                'data' => [
                    'token' => $token,
                    'user' => $user
                ]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    // ! Register
    public function register(Request $request)
    {
        try {
            // * Validate Request
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

            // * Check Validation
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            // * Image Path
            $imagePath = null;
            // * Check if user uploaded an image
            if ($request->hasFile('image')) {
                // * Get Image
                $image = $request->file('profile_picutre');

                // * Generate a random string of 10 characters
                $randomString = Str::random(10);
                // * Get Current Date
                $currentDate = date('d_m_Y');
                // * Generate File Name
                $fileName = "{$currentDate}_{$randomString}." . $image->getClientOriginalExtension();
                // * Store Image
                $filePath = $image->storeAs('images/user', $fileName, 'public');

                // * Update user's image with the new file path
                $imagePath = $filePath;
            } else {
                $imagePath = 'images/user/default.png';
            }

            // * Create User
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);


            // * Create Token
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Successfully registered',
                'data' => [
                    'token' => $token,
                    'user' => $user
                ]
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    // ! Logout
    public function logout(Request $request)
    {
        try {
            // * Get User
            $user = $request->user();

            // * Revoke Token
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Successfully logged out'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
