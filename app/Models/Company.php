<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use HasFactory;
    protected $table = "companys";
    protected $guarded = ["created_at", "updated_at"];

    protected $hidden = ['password'];
    public function employee()
    {
        return Company::hasMany("employees", "id", "companys_id");
    }
    public function admin()
    {
        return Company::belongsTo(User::class, "admin_id", "id");
    }
}