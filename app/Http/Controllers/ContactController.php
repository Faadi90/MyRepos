<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function contactForm(Request $request)
    {

        $request->file('file')->store('img');

        $data = $request->input('name');

        $request->session()->flash('contact',$data);

         return redirect('contact');
    }


    public function login(Request $request)
    {
        $data = $request->input('user');
        
        $request->session()->put('userinfo',$data);

       return redirect('profile');

       
    }

}
