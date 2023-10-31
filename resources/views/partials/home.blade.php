@extends('main')

@section('content')
    @if (session()->has('success'))
        <p>Logado</p>
    @endif
    @if (auth()->check())
        <p>Logado como <b>{{auth()->user()->username}}</b></p>
        <a href="{{ route('login.destroy') }}">Sair</a>
    @else
        <a href="{{ route('login.index') }}">Logar</a>
    @endif
@endsection
