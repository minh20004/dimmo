<?php

namespace App\Http\Controllers;

use App\Models\AdminAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAccountController extends Controller
{
    public function index()
    {
        $admins = AdminAccount::all();
        return view('admin.page.auth.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.page.auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admin_accounts',
            'password' => 'required|string|min:8',
        ]);

        AdminAccount::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin-accounts.index')
            ->with('success', 'Tài khoản Admin đã được tạo thành công.');
    }

    public function edit(AdminAccount $admin)
    {
        return view('admin.page.admin.edit', compact('admin'));
    }

    public function update(Request $request, AdminAccount $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->route('admin.index')
            ->with('success', 'Thông tin Admin đã được cập nhật.');
    }

    public function destroy(string $id)
    {
        $admin = AdminAccount::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin-accounts.index')
            ->with('success', 'Tài khoản Admin đã được xóa.');
    }

    
    public function show(string $id)
    {
        //
    }

    public function showLoginForm()
    {
        return view('admin.page.auth.login');
    }

    public function dashboard()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

}
