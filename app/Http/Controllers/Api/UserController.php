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
}
