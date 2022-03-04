@extends('layout')

@section('header')
    Login
@endsection

@section('content')
    @include('errors', ['errors' => $errors])

    <form method="POST" action="{{ route('login.login') }}">
        @csrf
        <div class="row">
            <div class="form-group" style="margin-bottom: 10px;">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Entrar</button>
        <a href="{{ route('register.create') }}" class="btn btn-light">Cadastrar</a>
    </form>
@endsection