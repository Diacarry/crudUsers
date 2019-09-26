@extends('layouts.blank')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="text-center"><br>
            <div class="">
                <h2>{{ $title }}</h2>
            </div>
            @auth
                <div class="links">
                    <a href="/users">Gestion de usuarios</a>
                    <a href="/hobbies">Agregar Pasa Tiempos</a>
                </div>
            @endauth
            @guest
                <p>Para hacer uso del aplicativo debe estar registrado y loggeado</p>
            @endguest
        </div>
    </div>
@endsection