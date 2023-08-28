<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    // ! Get Profile
    public function index(Request $request)
    {
        try {
            // * Get User
            $user = $request->user();

            return response()->json([
                'success' => true,
                'message' => 'Successfully get profile',
                'data' => [
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
    // ! Update Profile
    public function update(Request $request)
    {
        try {
            // * Get User
            $user = Auth::user();

            // * Validate Request
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'username' => 'required|unique:users,username,' . $user->id,
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:6',
            ]);

            // * Check Validation
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            // * Prepare data for update
            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
            ];
            
            // * Check if password is provided and update it if so
            if ($request->has('password') && !empty($request->password)) {
                $data['password'] = Hash::make($request->password);
            }

            // * Update User
            $user->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Successfully updated profile',
                'data' => [
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


}
