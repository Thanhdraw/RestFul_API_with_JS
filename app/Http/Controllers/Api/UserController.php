<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
