<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class TrashController extends Controller
{
    //
    public function trashUser()
    {
        $users = User::onlyTrashed()->get();
        $products = Product::onlyTrashed()->get();

        if ($users->isNotEmpty() || $products->isNotEmpty()) {
            return view('admin.trash.trash', compact('users', 'products'));
        }



    }
    public function restoreUser($id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        return redirect()->route('admin.user.list')->with('success', 'Khoi phuc thanh cong ' . $user->name);
    }
}
