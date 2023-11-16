<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        return view('pages.config-index', ['user' => Auth()->user()]);
    }

    public function indexChange()
    {
        return view('pages.config-index');
    }

    public function store(Request $request)
    {
        return view('pages.config-index');
    }

    public function delete(Request $request)
    {
        return view('pages.config-index');
    }
}
