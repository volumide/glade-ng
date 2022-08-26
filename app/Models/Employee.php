<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
{
    use HasFactory;
    protected $table = "employees";
    protected $guarded = ['created_at', 'updated_at'];

    public function company()
    {
        return Employee::belongsTo(Company::class, "company_id", "id");
    }
}