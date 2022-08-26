<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\CssSelector\Node\FunctionNode;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.admin.login');
    }

    public function register()
    {
        return view("auth.admin.register");
    }

    public function adminRegister(Request $request)
    {
        $validation = $request->validate([
            "password" => "required|min:6",
            "name" => "required",
            "email" => 'required|unique:users|email'
        ]);
        $request['password'] = Hash::make($request->password);
        $admin = User::create($request->all());
        return redirect()->to("/profile")->with("message", "Welcome {$admin->name} login to access your profile");
    }

    public function AdminLogin(Request $request)
    {
        $log = Auth::attempt(["email" => $request->email, "password" => $request->password]);
        // dd($log)
        if (!$log) return Redirect::back()->with("message", "Invalid username or password");
        return redirect()->intended("/profile")->with("message", "successful");
    }

    public function allAdmin(Request $request)
    {
        $allAdmin = User::where("role", 0)->paginate($perPage = 10)->withQueryString();
        return view('/auth.admin.adminlist', ["data" => $allAdmin]);
    }

    public function adminProfile($id)
    {
        $admin = User::find($id);
        return view("auth.admin.adminprofile", ["data" => $admin]);
    }

    public function deleteAdmin($id)
    {
        $delete = User::where("id", $id)->first()->delete();
        if ($delete)  return redirect()->intended("/admin/all");
        return redirect()->intended("/admin/all");
    }

    public function employeeLogin(Request $request)
    {
        $log = Auth::guard("employee")->attempt(["email" => $request->email, "password" => $request->password]);
        if (!$log) return redirect()->back()->with("message", "Invalid username or password");
        return redirect()->intended("/profile")->with("message", "successful");
    }

    public function companyLogin(Request $request)
    {
        $log = Auth::guard("company")->attempt(["email" => $request->email, "password" => $request->password]);
        if (!$log) return redirect()->back()->with("message", "Invalid username or password");
        $data = Auth::guard("company")->user();
        return redirect()->to("/profile")->with(['data' => $data]);
    }

    public function logout()
    {
        // if ($role === "company") Auth::guard("company")->logout();
        // if ($role === "employee") Auth::guard("employee")->logout();
        $admin = Auth::user();
        $company =  Auth::guard('company')->user();
        $employee =  Auth::guard('employee')->user();

        if ($admin) Auth::logout();
        if ($company) Auth::guard('company')->logout();
        if ($employee) Auth::guard('employee')->logout();

        Auth::guard('company')->logout();
        return redirect('/profile')->with("message", "logged out");
    }
}