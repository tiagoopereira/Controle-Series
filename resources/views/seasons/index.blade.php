@extends('layout')

@section('header')
    {{ $serie->name }}
@endsection

@section('action-button')
    <a href="{{ route('series.index') }}" class="btn btn-light">Voltar</a>
@endsection

@section('content')
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item align">
                Temporada {{ $season->season_number }}
            </li>
        @endforeach
    </ul>
@endsection