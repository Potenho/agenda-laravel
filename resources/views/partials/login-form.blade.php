@extends('main')

@section('content')
    <form action="{{ route('login.store') }}" method='POST'>
        @csrf
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>
                    <span>{{ $error }}</span>
                </div>
            @endforeach
        @endif
        <label for="username">Nome de Usuário</label><br>
        <input type='text' name='username' id='username' value={{ old('username') }}><br>
        <label for="password">Senha</label><br>
        <input type='password' name='password' id='password'><br><br>
        <input type='submit' value='Logar'>
    </form>
@endsection
