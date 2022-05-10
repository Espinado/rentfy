<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admins\Admin;
use Facade\Ignition\Context\LaravelConsoleContext;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use LaravelLocalization;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{

    public function __construct()
    {

        $this->middleware('admin', ['except' => ['Index', 'Login']]);
    }
    public function Index()
    {
        return view('admin.auth.login');
    }

    public function Dashboard()
    {
        return view('admin.index');
    }

    public function Login(Request $request)
    {

        $check = $request->all();
        if (Auth::guard('admin')->attempt([
            'email'    => $check['email'],
            'password' => $check['password']
        ])) {
            return redirect()->route('admin.dashboard')->with('success', 'Logged in');
        } else {
            return back()->with('error', 'Login failed');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success', 'Logged Out');
    }

    public function AdminRegister()
    {

        return view('admin.auth.admin_register');
    }

    public function AdminRegisterCreate(Request $request)
    {

        Admin::insert([
            'name'       =>   $request->name,
            'email'      =>   $request->email,
            'password'   =>   Hash::make($request->password),
            'created_at' =>   Carbon::now()
        ]);
        return redirect()->route('login_form')->with('success', 'Registered');
    }

    public function adminList()
    {
        $adminList = Admin::all();
        return view('admin.admins.index', compact('adminList'));
    }


}
