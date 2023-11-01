@extends('main')

@section('content')
    <form action="{{ route('register.save') }}" method='POST'>
        @csrf
        @include('partials/for-errors')
        <label for="username">Nome de Usuário</label><br>
        <input type='text' name='username' id='username' value={{ old('username') }}><br>
        <label for="password">Senha</label><br>
        <input type='password' name='password' id='password'><br>
        <label for="password_confirmation">Confirme a Senha</label><br>
        <input type='password' name='password_confirmation' id='password_confirmation'><br>

        <input type='submit' value='registrar'>
    </form>
@endsection
