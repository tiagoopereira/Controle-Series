@extends('layout')

@section('header')
    Adicionar Série
@endsection

@section('link')
    /series
@endsection

@section('link-text')
    Voltar
@endsection

@section('content')
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <button class="btn btn-dark">Adicionar</button>
        <a href="/series" class="btn btn-light">Cancelar</a>
    </form>
@endsection   