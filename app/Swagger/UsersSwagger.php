<?php

namespace App\Swagger;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

/**
 * @OA\Tag(
 *     name="Users",
 *     description="API Endpoints for User Management"
 * )
 */
class UsersSwagger extends Controller
{
    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Get all users",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Lấy users thành công"),
     *             @OA\Property(property="users", type="array", @OA\Items(ref="#/components/schemas/User"))
     *         )
     *     )
     * )
     */
    public function index()
    {
        $users = User::get();
        return response()->json([
            'message' => "Lấy users thành công",
            'users' => $users
        ]);
    }

    /**
     * @OA\Get(
     *     path="/users/{id}",
     *     summary="Get a specific user by ID",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Lay thanh cong user"),
     *             @OA\Property(property="user", ref="#/components/schemas/User")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Khong tim thay user")
     *         )
     *     )
     * )
     */
    public function getDetail($id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user) {
                return response()->json([
                    'message' => 'Lay thanh cong user',
                    'user' => $user
                ]);
            } else {
                return response()->json([
                    'message' => 'Khong tim thay user',
                    404
                ]);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * @OA\Put(
     *     path="/users/{id}",
     *     summary="Update an existing user",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="User ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"name", "email"},
     *                 @OA\Property(property="name", type="string", example="John Doe"),
     *                 @OA\Property(property="email", type="string", format="email", example="john.doe@example.com"),
     *                 @OA\Property(property="avatar", type="string", format="binary", description="User profile image")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User updated successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User updated successfully"),
     *             @OA\Property(property="user", ref="#/components/schemas/User")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="User not found")
     *         )
     *     )
     * )
     */
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