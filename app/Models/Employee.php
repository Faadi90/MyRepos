<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;
    // public $connection = 'mysql2';


    public function EmployeeDataBelong()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }



}
