@extends('layout')

@section('header')
    Séries
@endsection

@section('action-button')
    <a href="{{ route('series.create') }}" class="btn btn-dark">Adicionar</a>
@endsection

@section('content')
    @if (!empty($message))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
    
    @if (!count($series))
        <div class="series-empty">Adicione uma série para visualizá-la aqui!</div>    
    @endif

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item align">
                <span>{{ $serie->name }}</span>
                <div class="d-flex">
                    <a href="{{ route('seasons.index', ['id' => $serie->id]) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" action="/series/{{ $serie->id }}" onsubmit="return confirm('Tem certeza que deseja excluir {{ $serie->name }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection