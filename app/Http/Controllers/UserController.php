<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
#Controller way to fetch data without model:
// use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
    	// return DB::select('select * from users');

    	return view('user');
    }


    public function getData()
    {

    	return User::all();
    }

    public function apiData()
    {
        // https://dummy.restapiexample.com/api/v1/employees
    	$data = Http::get('https://reqres.in/api/users?page=1');
    	return view('user',['collectionAPI' => $data['data']]);
    }
    

}
