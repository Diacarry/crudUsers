@extends('layouts.general')
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
        <h2>LISTADO DE USUARIOS REGISTRADOS</h2><br><br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">E-mail</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">NickName</th>
                    <th scope="col">Ciudad</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $info)
                    <tr>
                        <th>{{ $info->email }}</th>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->nickname }}</td>
                        <td>{{ $info->city }}</td>
                    </tr>
                @empty
                    <tr>NO HAY DATA</tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection