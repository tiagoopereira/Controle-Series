@extends('layout')

@section('header')
    Temporada {{ $season->season_number }}
@endsection

@section('action-button')
    <a href="{{  route('seasons.index', ['id' => $season->serie_id]) }}" class="btn btn-light">Voltar</a>
@endsection

@section('content')
    <form method="POST" action="{{  route('episodes.watch', ['seasonId' => $season->id]) }}" class="d-flex flex-column">
        <div class="row">
            @csrf
            <ul class="list-group">
                @foreach ($episodes as $episode)
                    <li class="list-group-item align">
                        Episódio {{ $episode->episode_number }}
                        @auth
                            <input type="checkbox" class="form-check-input" name="episodes[]" value="{{ $episode->id }}" {{ $episode->watched ? 'checked' : '' }} />
                        @endauth
                        @guest
                            <input type="checkbox" class="form-check-input" {{ $episode->watched ? 'checked' : '' }} disabled />
                        @endguest
                    </li>
                @endforeach
            </ul>
        </div>
        @auth
            <div class="row d-flex justify-content-end">
                <button type="submit" class="btn btn-dark">Salvar</button>
            </div>
        @endauth
    </form>
@endsection