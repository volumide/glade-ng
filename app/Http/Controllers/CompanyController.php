<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Mail\NewRegMail;
use App\Models\Company;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;


use function PHPUnit\Framework\returnSelf;

class CompanyController extends Controller
{
    //

    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.signup");
    }


    public function registerCompany(Request $request)
    {
        $validation = $request->validate([
            "email" => "required|email|unique:companys",
            "password" => "required|min:6",
            "name" => "required",
            "img" => [File::image()->dimensions(Rule::dimensions()->minWidth(100)->minHeight(100)), 'nullable']
        ]);

        $image = Helper::uploadImage($request);
        // if ($image && $image === 100) redirect()->back()->with("message", "minimum image size is 100 X 100");
        if ($image) $request['logo'] = url("public/Image/{$image}");

        $password = $request->password;
        $request['password'] = Hash::make($request->password);
        $company = Company::create($request->all());
        $data = ["message" => "successful,", "name" => $company['name'], "password" => $password];

        // dd($data['name']);
        Mail::to($company->email)->send(new NewRegMail($data));
        return redirect()->to("/profile")->with("message", "registeration successful");
    }

    public function getAllCompanys()
    {
        $allCompany = Company::paginate($perPage = 10)->withQueryString();
        return view('auth.companylist', ["data" => $allCompany]);;
    }

    public function getCompany($id)
    {
        if (!Auth::user()) return redirect('/profile')->with("message", "unautorized");
        if (Auth::user() && Auth::user()->role)
            $company = Company::with("admin")->findOrFail($id);
        else
            $company = Company::find($id);
        return view("auth.companyprofile", ["data" => $company]);
    }

    public function viewCompanyUpdate($id)
    {
        $company = Company::find($id);
        return view("auth.companyupdate", ["data" => $company]);
    }

    public function updateCompany(Request $request, $id)
    {
        $validation = $request->validate([
            "password" => "min:6|nullable",
            "email" => "email|unique:companys|nullable",
            "img" => [File::image()->dimensions(Rule::dimensions()->minWidth(100)->minHeight(100)), 'nullable']
        ]);
        $request_only = $request->except("_token");
        $requests_without_null_fields =  array_filter($request_only);

        $image = Helper::uploadImage($request);
        if ($image) {
            $requests_without_null_fields['logo'] = url("public/Image/{$image}");
            unset($requests_without_null_fields['img']);
        }
        if (in_array("password", $requests_without_null_fields)) $requests_without_null_fields['password'] = Hash::make($request->password);
        $update = Company::where('id', $id)->update($requests_without_null_fields);
        return redirect("/profile")->with("message", "profile updated");
    }


    public function deleteCompany($id)
    {
        Company::find($id)->delete();
        return "";
    }
}