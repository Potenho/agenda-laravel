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
        return view('pages.login-form');
    }

    public function register()
    {
        return view('pages.register-form');
    }

    public function save(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:8|max:20',
            'password' => 'required|string|confirmed|min:8|max:20',
        ], [
            'username.required' => 'O nome de usuário precisa ser preenchido!',
            'username.min' => 'O nome de usuário precisa ter entre 8 a 20 caractéres!',
            'username.max' => 'O nome de usuário precisa ter entre 8 a 20 caractéres!',
            'password.required' => 'A senha precisa ser preenchida!',
            'password.min' => 'A senha precisa ter entre 8 a 20 caractéres!',
            'password.max' => 'A senha precisa ter entre 8 a 20 caractéres!',
            'password.confirmed' => 'As senhas não condizem!',
        ]);

        if (User::where('username', $request->input('username'))->first()) {
            return redirect()->route('register.index')->withErrors(['error' => 'Uma conta com este nome de usuário já existe!']);
        }

        var_dump(array_rand(config('defaultPfpColors')));

        User::create([
            'username' => $request->input('username'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
            'pfpColor' => config('defaultPfpColors')[array_rand(config('defaultPfpColors'))],
        ]);

        return redirect()->route('login.index')->with(['success' => 'Usuário criado! Por favor, faça o login.']);
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
            return redirect()->route('login.index')->withErrors(['error' => 'Nome de usuário ou senha inválido(s)']);
        }

        if (!password_verify($request->input('password'), $user->password)) {

            return redirect()->route('login.index')->withErrors(['error' => 'Nome de usuário ou senha inválido(s)']);
        }

        Auth::loginUsingId($user->id);

        return redirect()->route('home.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('home.index');
    }
}
