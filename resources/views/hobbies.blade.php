@extends('layouts.general')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-secondary">Cuenta</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        @auth
            <h2>FORMULARIO PARA REGISTRO DE HOBBIES <a href="/" class="btn btn-info">Ir a menu</a></h2>
            <p>Hobbies del usuario: {{ $user->name }}</p>
            <ul>
                @foreach ($data as $info)
                    <li>{{ $info->hobby }}</li>
                @endforeach
            </ul>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/hobbies" method="post">
                @csrf
                <div class="form-group row">
                    <label for="inputB" class="col-sm-2 col-form-label">Hobby</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hobby" name="hobby" placeholder="Escriba algu hobby" value="{{ old('hobby') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Agregar</button>
            </form>
        @endauth
        @guest
            <p>Para poder añadir hobbies debe estar registrado y loggeado</p>
        @endguest
    </div>
@endsection