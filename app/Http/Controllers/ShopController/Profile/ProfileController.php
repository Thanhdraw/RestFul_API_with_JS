<?php
namespace App\Http\Controllers\ShopController\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function index()
    {
        // Lấy thông tin user hiện tại
        $user = Auth::user();
        return view('customers.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',

        ]);

        // Cập nhật thông tin user
        $user->update($request->only('name', 'email', 'phone', 'address'));

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
    public function destroy(Request $request): RedirectResponse
    {


        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}

?>