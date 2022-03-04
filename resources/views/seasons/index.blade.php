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
                <a href="{{ route('episodes.index', ['seasonId' => $season->id]) }}">Temporada {{ $season->season_number }}</a>
                <span class="badge bg-dark"> {{ $season->watchedEpisodes()->count() }}/{{ $season->episodes->count() }}</span>
            </li>
        @endforeach
    </ul>
@endsection