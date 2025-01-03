<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu yêu cầu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',  // password_confirmation là trường xác nhận mật khẩu
        ]);
        // $customerRole = Role::where('role_id', 2)->first();
        // Tạo người dùng mới và mã hóa mật khẩu
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Mã hóa mật khẩu bằng Bcrypt
            // 'role_id' => $customerRole,
        ]);

        // Đăng nhập người dùng ngay sau khi tạo
        auth()->login($user);

        // Chuyển hướng đến trang chủ hoặc trang cần thiết
        return redirect()->route('home');
    }
}

