@extends('layout')

@section('header')
    Temporada {{ $season->season_number }}
@endsection

@section('action-button')
    <a href="{{  route('seasons.index', ['id' => $season->serie_id]) }}" class="btn btn-light">Voltar</a>
@endsection

@section('content')
    <ul class="list-group">
        @foreach ($episodes as $episode)
            <li class="list-group-item align">
                Episódio {{ $episode->episode_number }}</a>
            </li>
        @endforeach
    </ul>
@endsection