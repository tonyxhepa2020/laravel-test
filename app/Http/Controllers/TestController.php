<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function attach()
     {
         auth()->user()->assignRole('user');
         return view('welcome');
    }
}
