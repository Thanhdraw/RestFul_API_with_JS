<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class AdminController extends Controller
{
    //user - list
    public function list()
    {
        try {
            $users = User::paginate(2); // Hiển thị 10 bản ghi trên mỗi trang
            return view('admin.users.list', compact('users'));
        } catch (\Exception $e) {
            $users = collect();
            return view('admin.users.list', compact('users'))
                ->with('error', 'Đã xảy ra lỗi  ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);
        try {
            $name = $request->input('search');
            $users = User::where('name', 'like', '%' . $name . '%')->paginate(10); // Hiển thị 10 bản ghi trên mỗi trang
            if ($users->isEmpty()) {
                return view('admin.users.list', compact('users'))
                    ->with('error', 'Không tìm thấy tìm kiếm: ' . $name);
            }
            return view('admin.users.list', compact('users'))->with('success', 'Tìm kiếm thanh cong');
        } catch (\Exception $e) {
            $users = collect();
            return view('admin.users.list', compact('users'))
                ->with('error', 'Đã xảy ra lỗi khi tìm kiếm: ' . $e->getMessage() . ' ' . $name);
        }
    }

    // user - add
    public function addUser()
    {
        return view('admin.users.add');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

        ]);
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            if ($user) {
                return redirect()->back()->with('success', 'Them thanh cong');
            } else {
                return redirect()->back()->with('error', 'Them that bai');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi  ' . $e->getMessage());
        }
    }
    // user edit
    public function editUser($id)
    {
        try {
            $user = User::findorFail($id);
            return view('admin.users.edit', compact('user'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi  ' . $e->getMessage());
        }
    }

    // action update user
    public function updateUser(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        $old_user = User::findorFail($id);
        try {
            $user = $old_user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);
            if ($user) {
                return redirect()->back()->with('success', 'Cap nhat thanh cong');
            }
            return redirect()->back()->with('error', 'Cap nhat that bai');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi  ' . $e->getMessage());
        }
    }

    // action delete user
    public function deleteUser($id)
    {
        try {
            $user = User::findorFail($id);
            $user->delete();
            return redirect()->back()->with('success', 'Xoa thanh cong');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi  ' . $e->getMessage());
        }
    }

    // product - CRUD
    public function listProduct()
    {
        try {
            $message = "";
            $products = Product::paginate(10);
            if (count($products) == 0) {
                $message = "Khong tim thay san pham nao";
            }
            return view('admin.products.list', compact('products'))->with('message', $message);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    // category - CRUD
    public function listCategory()
    {
        try {
            $message = "";
            $categories = Category::paginate(5);
            $count = count($categories);
            if (count($categories) == 0) {
                $message = "Khong tim thay danh muc nao";
            }
            return view('admin.category.list', compact('categories'))
                ->with('count', $count)
                ->with('message', $message);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
