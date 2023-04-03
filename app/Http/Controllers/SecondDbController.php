<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class SecondDbController extends Controller
{
    
    public function seconddb()
    {

        // return DB::connection('mysql2')->table('employees')->get();
        return Employee::all();

    }


}
