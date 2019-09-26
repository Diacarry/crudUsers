@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">DashBoard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>FELICIDADES EL REGISTRO FUE EXITOSO Y YA ESTAS LOGEADO</p>
                    <a href="/" class="btn btn-success">Menú</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection