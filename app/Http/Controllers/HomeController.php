<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function documentation()
    {
        return view('pages.documentation');
    }
}
