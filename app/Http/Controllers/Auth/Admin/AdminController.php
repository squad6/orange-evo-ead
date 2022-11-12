<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::whereNot('id', Auth::guard('admin')->user()->id)->get();

        return view('admin.dashboard', ['admins' => $admins]);
    }

    function registerView()
    {
        return view('admin.auth.register');
    }

    public function loginView()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $check = $request->all();

        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('message', 'E-mail ou senha inválida.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('message', 'Logout efetuado com sucesso');
    }

    public function create(Request $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.dashboard')->with('message', 'Administrador criado com sucesso');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.dashboard');
    }
}
