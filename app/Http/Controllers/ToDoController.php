<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        
        $toDos = $user->toDos;

        return view('partials/todos');
    }
}
