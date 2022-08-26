<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


use function PHPUnit\Framework\isNull;

class EmployeeController extends Controller
{
    public function registerForm()
    {
        $allCompany = Company::all();
        return view('auth.employee.register', ["data" => $allCompany]);
    }

    public function login()
    {
        return view('auth.employee.login');
    }

    public function registerEmployee(Request $request)
    {
        $company = Auth::guard("company")->user();
        $validation = $request->validate([
            "password" => "required|min:6",
            "first_name" => "required",
            "last_name" => "required",
            "email" => 'required|unique:employees',
            "company_id" => Rule::requiredIf(fn () => !$company),
        ]);

        if ($company)
            $request['company_id'] = $company->id;
        $request['password'] = Hash::make($request->password);
        $employee = Employee::create($request->all());
        return redirect()->to("/profile")->with("message", $employee->id);
        // $data = ["nessage" => "successfu,", "id" => $employee->id];
        // return $data;
    }


    public function viewProfile()
    {
        $data = Auth::guard("employee")->user();
        return view("auth.employee.employeeprofile", $data);
    }

    public function getAllEmployees()
    {
        $company = Auth::guard("company")->user();
        // dd($company);
        if ($company) {
            $companyEmployee = Employee::where("company_id", $company->id)->paginate($perPage = 10)->withQueryString();
            return view("auth.employee.employeelist", ["data" => $companyEmployee]);
        }

        $allEmployee = Employee::paginate($perPage = 10)->withQueryString();
        return view("auth.employee.employeelist", ["data" => $allEmployee]);
    }

    public function getEmployee($id)
    {
        $employee = Employee::with("company")->findOrFail($id);
        return view("auth.employee.employeprofile", ["data" => $employee]);
    }

    public function viewEmployeeUpdate($id)
    {
        $employee = Employee::with("company")->find($id);
        return view("auth.employee.employeeupdate", ["data" => $employee]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $validation = $request->validate([
            "email" => "email|unique:companys|nullable",
            "password" => "min:6|nullable"
        ]);

        $request_only = $request->except("_token");
        $requests_without_null_fields =  array_filter($request_only);

        if (in_array("password", $requests_without_null_fields)) $requests_without_null_fields['password'] = Hash::make($request->password);
        $update = Employee::where('id', $id)->update($requests_without_null_fields);
        return redirect("/profile")->with("message", "profile updated");;
    }

    public function deleteEmployee($id)
    {
    }
}