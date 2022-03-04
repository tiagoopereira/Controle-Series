@extends('layout')

@section('header')
    Cadastrar
@endsection

@section('content')
    @include('errors', ['errors' => $errors])

    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="row">
            <div class="form-group" style="margin-bottom: 10px;">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome">
            </div>
            <div class="form-group" style="margin-bottom: 10px;">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Senha">
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Cadastrar</button>
        <a href="{{ route('login.index') }}" class="btn btn-light">Entrar</a>
    </form>
@endsection