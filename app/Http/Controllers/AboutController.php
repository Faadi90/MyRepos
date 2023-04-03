<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use App\Models\About;

class AboutController extends Controller
{

    public function accessor()
    {

        return About::get();
    }

    public function mutator()
    {
        $mutator = new About;
        $mutator->name = 'Fahad';
        $mutator->save();
    }

    public function inlineBlade()
    {
        $data = 20;

        return Blade::render('<h1>The total is : {{ $total }}</h1> </br> This is Inline Blade Template useing. ', ['total' => $data]);
    }
}
