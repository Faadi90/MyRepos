<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function EmployeeDataOne()
    {

        return $this->hasOne(Employee::class)->withDefault(['Key'=>'There is no data available']);
        // return $this->hasOne(Employee::class, 'company_id', 'id');
    }

    public function EmployeeDataMany()
    {
        // return $this->hasMany('App\Models\Employee');
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }

    public function EmpCommentsOne(){

        return $this->hasOneThrough(Comment::class, Employee::class);
 
    }

    public function EmpCommentsMany()
    {

        return $this->hasManyThrough(Comment::class, Employee::class, 'company_id', 'employee_id', 'id', 'id');
    }
}
