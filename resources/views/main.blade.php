@extends('layouts.app')

@section('content')
    <div>
        @if (auth()->check())
        <p>Logado como <b>{{ auth()->user()->username }}</b></p>
        <a href="{{ route('login.destroy') }}">Sair</a>
        @else
        <a href="{{ route('login.index') }}">Logar</a>
        <a href="{{ route('register.index') }}">Registrar</a>
        @endif
    </div>
@endsection
