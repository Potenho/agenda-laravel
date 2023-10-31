@extends('main')

@section('content')
    <a href="{{ route('login.index') }}">Logar</a>
    <form action="{{ route('register.save') }}" method='POST'>
        @csrf
        @if ($errors->any())
            <div>
                <span>{{ $message }}</span>
            </div>
        @endif
        <input type='text' name='username' id='username' value={{ old('username') }}><br>
        <input type='password' name='password' id='password'><br>
        <input type='password' name='password_confirmation' id='password_confirmation'><br>

        <input type='submit' value='registrar'>
    </form>
@endsection
