<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class QBController extends Controller
{
    public function qbuilder(){

/*        DB::table('cruds')
        ->where('name','Faadi')
        ->delete();*/

/*        ->update(
            [
                "name"=>"Faadi Hussain",
                "detail"=>"Lorem Ipsum updated",
                "image"=>"dummy image updated"
            ],
        );*/

       // $q =  DB::connection('mysql2')->table('employees')->get();

        $data = DB::table('cruds')->get();

        // dd(DB::getQueryLog());

        return view('qb', ['data'=> $data]);

    }

    public function joinprac()
    {
        return DB::table('company')
        ->leftjoin('employee','company.id','=','employee.company_id')
        // ->select('employee.name')
        ->where('company_id',2)
        ->get();
    }

    public function RMBinding(Employee $key)
    {
        return $key;
    }
}
