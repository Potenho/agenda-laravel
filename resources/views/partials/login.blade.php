@extends('main')

@section('content')
    <form action="{{ route('login.store') }}" method='POST'>
        @csrf

        @error('error')
            <div>
                <span>{{ $message}}</span>
            </div>
        @enderror
        @error('username')
            <div class=''>
                <span>{{ $message }}</span>
            </div>
        @enderror
        @error('password')
            <div>
                <span>{{ $message }}</span>
            </div>
        @enderror
        <input type='text' name='username' id='username' value={{ old('username') }}><br>
        <input type='password' name='password' id='password'><br>

        <input type='submit' value='logar'>
    </form>
@endsection
