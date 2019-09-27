@extends('layouts.general')
@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-primary">Status</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h2>LISTADO DE USUARIOS REGISTRADOS</h2>
        <h4>Panel del {{ $role }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">E-mail</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">NickName</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $info)
                    <tr>
                        <th>{{ $info->email }}</th>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->nickname }}</td>
                        <td>{{ $info->city }}</td>
                        <td>{{ $info->perfil }}</td>
                        <td><a href="/users/{{ $info->email }}/edit" class="btn btn-warning"></a></td>
                        <td>
                            <form action="/users/{{ $info->email }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>NO HAY DATA</tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection