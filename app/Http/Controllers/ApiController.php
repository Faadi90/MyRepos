<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Validator;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function apiShow()
    {
        return 
        [
            "Firts_Name" => "Fahad",
            "Last_Name" => "Hussain",
            "Email" => "faadi3media@gmail.com",
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function apiStore(Request $request)
    {
            $employee = new Employee;

            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->company_id = $request->company_id;

            $status = $employee->save();
            return $status ?  ["result" => "Your data has been saved!"]:["result" =>"Operation Failed."];
    }

    /**
     * Display the specified resource.
     */
    public function apiShowDb($id = null)
    {
        return $id?Employee::find($id):Employee::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function apiUpdate(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->company_id = $request->company_id;

        $status = $employee->save();
        return $status ? ["result"=>"Your data has been updated."]:['Operation Failed.'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function apiDelete($id)
    {
        $employee = Employee::find($id);
        $status = $employee->delete();
        
        return $status ? ['result'=>'Your data has been deleted.']:['result'=>'Operation Failed'];
    }

    public function apiSearch($name)
    {
        return Employee::where('name','like','%'.$name.'%')->get();

    }

    public function apiValidate(Request $request)
    {

/*        $request->validate([

                "name" => "required",
                "company_id" => "required | max:4"
            ]);*/

        
        $rules = [

            "name" => "required",
            "company_id" => "required | max:4"
        ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                return response()->json($validator->errors(),401);

            }else{

                $employee = new Employee;
                $employee->name = $request->name;
                $employee->email = $request->email;
                $employee->company_id = $request->company_id;

                $status = $employee->save();
                return $status ?  ["result" => "Your data has been saved!"]:["result" =>"Operation Failed."];

            }

    }

    public function apiUpload(Request $request)
    {
           $status = $request->file('file')->store('apiFile');
           return ['result'=>$status];

    }

}
