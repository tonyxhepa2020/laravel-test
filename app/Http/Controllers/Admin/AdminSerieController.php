<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSerieController extends Controller
{
    public function index() 
    {
        return view('admin.series.index');
    }
}
