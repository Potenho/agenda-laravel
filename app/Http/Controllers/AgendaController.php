<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function index()
    {
        return view('partials/home');
    }
}
