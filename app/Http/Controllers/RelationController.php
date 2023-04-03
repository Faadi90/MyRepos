<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class RelationController extends Controller
{

    public function HasOne()
    {
        return Company::find(2)->EmployeeDataOne;

    }

    public function HasMany()
    {
        return Company::find(1)->EmployeeDataMany;
    }
}
