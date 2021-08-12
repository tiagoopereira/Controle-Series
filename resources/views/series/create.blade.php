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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                    <li style="list-style: none;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <button class="btn btn-dark">Adicionar</button>
        <a href="{{ route('series.index') }}" class="btn btn-light">Cancelar</a>
    </form>
@endsection   