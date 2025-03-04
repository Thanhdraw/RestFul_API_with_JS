<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::get();
        return response()->json([
            'message' => "Lấy users thành công",
            'users' => $users
        ]);

    }

    public function getDetail($id)
    {
        try {
            //code...
            $user = User::findOrFail($id);
            if ($user) {
                return response()->json([
                    'message' => 'Lay thanh cong user',
                    'user' => $user
                ]);

            } else {
                return response()->json([
                    'message' => 'Khong6 tim thay user',
                    404
                ]);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }

    }




    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            Log::info("User not found with ID: $id");
            return response()->json(['error' => 'User not found'], 404);
        }

        Log::info("Data received:", $request->all());

        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);

        if ($request->hasFile('avatar')) {
            Log::info("Avatar uploaded");
            if ($user->avatar && file_exists(public_path(str_replace("/storage", "storage", $user->avatar)))) {
                Log::info("Old avatar deleted");
                unlink(public_path(str_replace("/storage", "storage", $user->avatar)));
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            // $user->avatar = "/storage/" . $path;
            Log::info("Avatar storage path: $path");
        } else {
            Log::info("Avatar storage bi loi");
        }

        $user->updated_at = now();
        $user->save();

        Log::info("User updated successfully", $user->toArray());
        Log::info("All request data:", $request->all());

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ], 200);
    }









}

