@extends('layout')

@section('header')
    Séries
@endsection

@section('add-button')
    <a href="/series/create" class="btn btn-dark">Adicionar</a>
@endsection

@section('content')
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->name }}</li>
        @endforeach
    </ul>
@endsection