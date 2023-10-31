<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('partials/login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'O nome de usuário precisa ser preenchido!',
            'password.required' => 'A senha precisa ser preenchida!',
        ]);

        $user = User::where('username', $request->input('username'))->first();

        if (!$user) {
            return redirect()->route('login.index')->withErrors(['error' => 'Email or password invalida']);
        }

        if (!password_verify($request->input('password'), $user->password)) {

            return redirect()->route('login.index')->withErrors(['error' => 'Email or password invalida']);
        }

        Auth::loginUsingId($user->id);

        return redirect()->route('home')->with('success', 'Logged in');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
