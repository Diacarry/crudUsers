@extends('layouts.general')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Status</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h2>DATOS DEL USUARIO : {{ $usuario->email }}</h2><br>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/users/{{ $usuario->email }}" method="post">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="inputA" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <label for="">{{ $usuario->email }}</label>
                    <!--<input type="email" readonly class="form-control-plaintext" id="inputA" name="inputA" value="{{ $usuario->email }}">-->
                </div>
            </div>
            <div class="form-group row">
                <label for="inputB" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ $usuario->name }}" value="{{ $usuario->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputC" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <!--<div class="form-group row">
                <label for="inputD" class="col-sm-2 col-form-label">Repeat Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="passwordr" name="passwordr" placeholder="Repeat Password">
                </div>
            </div>-->
            <div class="form-group row">
                <label for="inputE" class="col-sm-2 col-form-label">NickName</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nickname" name="nickname" placeholder="{{ $usuario->nickname }}" value="{{ $usuario->nickname }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputF" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" name="city" placeholder="{{ $usuario->city }}" value="{{ $usuario->city }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputG" class="col-sm-2 col-form-label">Perfil => {{ $usuario->perfil }}</label>
                <div class="col-sm-10">
                    <select name="perfil" id="perfil" class="form-control">
                        <option value="">Elija un rol</option>
                        <option value="Usuario">Usuario</option>
                        <option value="Admin">Administrador</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
    </div>
@endsection